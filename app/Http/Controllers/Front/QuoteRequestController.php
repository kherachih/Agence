<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use App\Models\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuoteRequestController extends Controller
{
    /**
     * Display the standalone quote request form
     */
    public function showForm()
    {
        $general_setting = \Modules\GlobalSetting\App\Models\GlobalSetting::first();
        $footer = Frontend::where('data_keys', 'footer')->first();
        $currency_list = \Modules\Currency\App\Models\Currency::where('status', 1)->get();
        $language_list = \Modules\Language\App\Models\Language::where('status', 1)->get();

        return view('quote_request', compact('general_setting', 'footer', 'currency_list', 'language_list'));
    }

    public function store(Request $request)
    {
        // Check if this is a standalone form submission or from service detail
        $isStandalone = empty($request->service_id);

        if ($isStandalone) {
            $rules = [
                'first_name' => 'required',
                'last_name' => 'nullable',
                'email' => 'required|email',
                'phone' => 'required',
                'departure_country' => 'required',
                'destination_country' => 'required',
                'adults' => 'required|integer|min:1',
                'children' => 'nullable|integer|min:0',
                'date_depart' => 'required',
                'hotel_stars' => 'nullable',
                'flight_ticket_included' => 'nullable',
                'room_details' => 'nullable',
            ];
        } else {
            $rules = [
                'service_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'nullable',
                'email' => 'required|email',
                'phone' => 'required',
                'date_depart' => 'nullable',
                'date_retour' => 'nullable',
                'person' => 'nullable|integer',
                'children' => 'nullable|integer',
                'flight_ticket_included' => 'nullable',
            ];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $quote = new QuoteRequest();
        
        if ($isStandalone) {
            // Standalone form fields
            $quote->first_name = $request->first_name;
            $quote->last_name = $request->last_name ?? '';
            $quote->email = $request->email;
            $quote->phone = $request->phone;
            $quote->adults = $request->adults;
            $quote->children = $request->children ?? 0;
            $quote->date_depart = $request->date_depart;
            $quote->date_retour = null; // Not used in standalone form
            
            // Construct detailed room details
            $roomDetails = "Departure Country: " . $request->departure_country . "\n";
            $roomDetails .= "Destination Country: " . $request->destination_country . "\n";
            $roomDetails .= "Hotel Stars: " . ($request->hotel_stars ?? '4') . " stars\n";
            $roomDetails .= "Flight Ticket: " . ($request->flight_ticket_included ? 'INCLUDED' : 'NOT INCLUDED') . "\n";
            if ($request->room_details) {
                $roomDetails .= "\nAdditional Notes: " . $request->room_details;
            }
            $quote->room_details = $roomDetails;
        } else {
            // Service detail form fields
            $quote->service_id = $request->service_id;
            $quote->first_name = $request->first_name;
            $quote->last_name = $request->last_name ?? '';
            $quote->email = $request->email;
            $quote->phone = $request->phone;
            $quote->adults = $request->person ?? $request->adults ?? 0;
            $quote->children = $request->children ?? 0;
            $quote->date_depart = $request->date_depart;
            $quote->date_retour = $request->date_retour;
            
            // Construct room details with flight ticket info
            $dateDepart = $request->date_depart ?? 'Not specified';
            $dateRetour = $request->date_retour ?? 'Not specified';
            $roomDetails = "Date Depart: " . $dateDepart . " | Date Retour: " . $dateRetour;
            if ($request->flight_ticket_included) {
                $roomDetails .= " | Flight Ticket: INCLUDED";
            }
            $quote->room_details = $roomDetails;
        }
        
        $quote->save();

        Session::flash('first_name', $request->first_name);
        Session::flash('message', __('translate.Your quote request has been received successfully. We will contact you soon.'));
        Session::flash('alert-type', 'success');

        // If standalone form, redirect to the form page with success
        if ($isStandalone) {
            return redirect()->route('quote-request.form')->with(['success' => true]);
        }

        return redirect()->back();
    }
}
