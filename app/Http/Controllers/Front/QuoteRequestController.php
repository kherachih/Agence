<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuoteRequestController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'service_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email',
            'phone' => 'required',
            'check_in_date' => 'nullable',
            'person' => 'nullable|integer',
            'children' => 'nullable|integer',
            'flight_ticket_included' => 'nullable',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $quote = new QuoteRequest();
        $quote->service_id = $request->service_id;
        $quote->first_name = $request->first_name;
        $quote->last_name = $request->last_name ?? '';
        $quote->email = $request->email;
        $quote->phone = $request->phone;
        $quote->adults = $request->person ?? $request->adults ?? 0;
        $quote->children = $request->children ?? 0;
        
        // Construct room details with flight ticket info
        $roomDetails = "Date: " . ($request->check_in_date ?? 'Not specified');
        if ($request->flight_ticket_included) {
            $roomDetails .= " | Flight Ticket: INCLUDED";
        }
        $quote->room_details = $roomDetails;
        $quote->save();

        Session::flash('first_name', $request->first_name);
        Session::flash('message', __('translate.Your quote request has been received successfully. We will contact you soon.'));
        Session::flash('alert-type', 'success');

        return redirect()->back();
    }
}