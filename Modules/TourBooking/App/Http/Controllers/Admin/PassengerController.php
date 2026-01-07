<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\TourBooking\App\Models\Booking;
use Modules\TourBooking\App\Models\Passenger;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PassengerController extends Controller
{
    /**
     * Display passenger information for a booking.
     */
    public function show(Booking $booking)
    {
        $passengers = $booking->passengers;

        return view('tourbooking::admin.passenger.show', compact('booking', 'passengers'));
    }

    /**
     * Download booking confirmation PDF with passenger details.
     */
    public function downloadConfirmation(Booking $booking)
    {
        $passengers = $booking->passengers;

        $pdf = Pdf::loadView('tourbooking::admin.passenger.confirmation-pdf', [
            'booking' => $booking,
            'passengers' => $passengers,
        ]);

        $fileName = 'booking-confirmation-' . $booking->booking_code . '.pdf';

        return $pdf->download($fileName);
    }

    /**
     * Download passport file.
     */
    public function downloadPassport(Passenger $passenger)
    {
        if (!$passenger->passport_file) {
            abort(404, 'Passport file not found.');
        }

        $filePath = storage_path('app/public/' . $passenger->passport_file);

        if (!file_exists($filePath)) {
            abort(404, 'Passport file not found.');
        }

        return response()->download($filePath);
    }

    /**
     * Download insurance file.
     */
    public function downloadInsurance(Passenger $passenger)
    {
        if (!$passenger->insurance_file) {
            abort(404, 'Insurance file not found.');
        }

        $filePath = storage_path('app/public/' . $passenger->insurance_file);

        if (!file_exists($filePath)) {
            abort(404, 'Insurance file not found.');
        }

        return response()->download($filePath);
    }

    /**
     * Update passenger information (admin only).
     */
    public function update(Request $request, Passenger $passenger)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'nationality' => 'nullable|string|max:100',
            'passport_number' => 'nullable|string|max:50',
            'passport_expiry_date' => 'nullable|date|after:today',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'special_requirements' => 'nullable|string|max:1000',
        ]);

        $passenger->update($validated);

        return back()->with('success', __('translate.Passenger information updated successfully.'));
    }
}
