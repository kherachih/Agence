<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function index()
    {
        $quotes = QuoteRequest::orderBy('id', 'desc')->paginate(10);
        return view('admin.quote_requests.index', compact('quotes'));
    }

    public function show($id)
    {
        $quote = QuoteRequest::findOrFail($id);
        return view('admin.quote_requests.show', compact('quote'));
    }

    public function destroy($id)
    {
        $quote = QuoteRequest::findOrFail($id);
        $quote->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function sendQuote(Request $request, $id)
    {
        $request->validate([
            'price_adult' => 'required',
            'children_price' => 'nullable',
            'rooms' => 'required',
            'message' => 'required',
        ]);

        $quote = QuoteRequest::findOrFail($id);

        $data = [
            'name' => $quote->first_name . ' ' . $quote->last_name,
            'service_title' => $quote->service ? $quote->service->translation?->title : 'Unknown Service',
            'price_adult' => $request->price_adult,
            'price_child' => $request->children_price ?? 'N/A',
            'rooms' => $request->rooms,
            'message' => $request->message,
            'subject' => 'Quote Proposal: ' . ($quote->service ? $quote->service->translation?->title : ''),
        ];

        \Illuminate\Support\Facades\Mail::to($quote->email)->send(new \App\Mail\SendQuoteMail($data));

        return redirect()->back()->with('success', __('translate.Email sent successfully'));
    }
}