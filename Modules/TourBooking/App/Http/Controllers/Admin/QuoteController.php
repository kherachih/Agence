<?php

namespace Modules\TourBooking\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\TourBooking\App\Models\Quote;

class QuoteController extends Controller
{
    /**
     * Display a listing of all quotes.
     */
    public function index(): View
    {
        $quotes = Quote::with('service:id,slug,translation')
            ->latest()
            ->paginate(15);

        return view('tourbooking::admin.quotes.index', compact('quotes'));
    }

    /**
     * Display the specified quote.
     */
    public function show(int $id): View
    {
        $quote = Quote::with('service:id,slug,translation')
            ->findOrFail($id);

        return view('tourbooking::admin.quotes.show', compact('quote'));
    }

    /**
     * Update the specified quote status.
     */
    public function updateStatus(Request $request, int $id)
    {
        $quote = Quote::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,completed',
        ]);

        $quote->update([
            'status' => $validated['status'],
        ]);

        return response()->json([
            'success' => true,
            'message' => __('translate.Quote status updated successfully'),
        ]);
    }

    /**
     * Remove the specified quote from storage.
     */
    public function destroy(int $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return response()->json([
            'success' => true,
            'message' => __('translate.Quote deleted successfully'),
        ]);
    }

    /**
     * Get pending quotes count for dashboard.
     */
    public function getPendingCount(): int
    {
        return Quote::pending()->count();
    }
}
