<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\TourBooking\App\Models\Booking;
use Modules\TourBooking\App\Models\Passenger;
use Illuminate\Support\Facades\Validator;

class PassengerController extends Controller
{
    /**
     * Display the form to add passenger information for a booking.
     */
    public function create(Booking $booking)
    {
        // Check if booking belongs to authenticated user
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        // Check if booking is paid
        if ($booking->payment_status !== 'completed') {
            return redirect()->route('user.bookings.details', ['id' => $booking->id])
                ->with('error', __('translate.Please complete payment first.'));
        }

        // Check if passenger info is already completed
        if ($booking->passenger_info_status === 'completed') {
            return redirect()->route('user.bookings.details', ['id' => $booking->id])
                ->with('info', __('translate.Passenger information already completed.'));
        }

        // Calculate number of passengers needed
        $totalPassengers = $booking->adults + $booking->children;

        return view('modules.tourbooking.user.passenger.create', compact('booking', 'totalPassengers'));
    }

    /**
     * Store passenger information.
     */
    public function store(Request $request, Booking $booking)
    {
        // Check if booking belongs to authenticated user
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        // Validate request
        $validator = Validator::make($request->all(), [
            'passengers' => 'required|array|min:1',
            'passengers.*.first_name' => 'required|string|max:255',
            'passengers.*.last_name' => 'required|string|max:255',
            'passengers.*.date_of_birth' => 'nullable|date',
            'passengers.*.gender' => 'nullable|in:male,female,other',
            'passengers.*.nationality' => 'nullable|string|max:100',
            'passengers.*.passport_number' => 'nullable|string|max:50',
            'passengers.*.passport_expiry_date' => 'nullable|date|after:today',
            'passengers.*.passport_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'passengers.*.insurance_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'passengers.*.phone' => 'nullable|string|max:20',
            'passengers.*.email' => 'nullable|email|max:255',
            'passengers.*.special_requirements' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Calculate expected number of passengers
        $expectedPassengers = $booking->adults + $booking->children;

        // Check if number of passengers matches booking
        if (count($request->passengers) !== $expectedPassengers) {
            return back()
                ->with('error', __('translate.Number of passengers must match booking (:count)', ['count' => $expectedPassengers]))
                ->withInput();
        }

        try {
            // Store passenger information
            foreach ($request->passengers as $index => $passengerData) {
                // Handle passport file upload
                $passportFile = null;
                if ($request->hasFile("passengers.{$index}.passport_file")) {
                    $passportFile = $request->file("passengers.{$index}.passport_file")
                        ->store('passengers/passports', 'public');
                }

                // Handle insurance file upload
                $insuranceFile = null;
                if ($request->hasFile("passengers.{$index}.insurance_file")) {
                    $insuranceFile = $request->file("passengers.{$index}.insurance_file")
                        ->store('passengers/insurance', 'public');
                }

                // Create passenger record
                Passenger::create([
                    'booking_id' => $booking->id,
                    'first_name' => $passengerData['first_name'],
                    'last_name' => $passengerData['last_name'],
                    'date_of_birth' => $passengerData['date_of_birth'] ?? null,
                    'gender' => $passengerData['gender'] ?? null,
                    'nationality' => $passengerData['nationality'] ?? null,
                    'passport_number' => $passengerData['passport_number'] ?? null,
                    'passport_expiry_date' => $passengerData['passport_expiry_date'] ?? null,
                    'passport_file' => $passportFile,
                    'insurance_file' => $insuranceFile,
                    'phone' => $passengerData['phone'] ?? null,
                    'email' => $passengerData['email'] ?? null,
                    'special_requirements' => $passengerData['special_requirements'] ?? null,
                    'is_primary' => $index === 0, // First passenger is primary
                ]);
            }

            // Update booking status
            $booking->update([
                'passenger_info_status' => 'completed',
                'passenger_info_completed_at' => now(),
            ]);

            return redirect()->route('user.bookings.details', ['id' => $booking->id])
                ->with('success', __('translate.Passenger information saved successfully.'));

        } catch (\Exception $e) {
            return back()
                ->with('error', __('translate.Error saving passenger information. Please try again.'))
                ->withInput();
        }
    }

    /**
     * Display passenger information for a booking.
     */
    public function show(Booking $booking)
    {
        // Check if booking belongs to authenticated user
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $passengers = $booking->passengers;

        return view('modules.tourbooking.user.passenger.show', compact('booking', 'passengers'));
    }

    /**
     * Show the form for editing passenger information.
     */
    public function edit(Booking $booking)
    {
        // Check if booking belongs to authenticated user
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $passengers = $booking->passengers;

        return view('modules.tourbooking.user.passenger.edit', compact('booking', 'passengers'));
    }

    /**
     * Update passenger information.
     */
    public function update(Request $request, Booking $booking)
    {
        // Check if booking belongs to authenticated user
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        // Validate request
        $validator = Validator::make($request->all(), [
            'passengers' => 'required|array',
            'passengers.*.id' => 'required|exists:passengers,id',
            'passengers.*.first_name' => 'required|string|max:255',
            'passengers.*.last_name' => 'required|string|max:255',
            'passengers.*.date_of_birth' => 'nullable|date',
            'passengers.*.gender' => 'nullable|in:male,female,other',
            'passengers.*.nationality' => 'nullable|string|max:100',
            'passengers.*.passport_number' => 'nullable|string|max:50',
            'passengers.*.passport_expiry_date' => 'nullable|date|after:today',
            'passengers.*.passport_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'passengers.*.insurance_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'passengers.*.phone' => 'nullable|string|max:20',
            'passengers.*.email' => 'nullable|email|max:255',
            'passengers.*.special_requirements' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            foreach ($request->passengers as $index => $passengerData) {
                $passenger = Passenger::findOrFail($passengerData['id']);

                // Verify passenger belongs to this booking
                if ($passenger->booking_id !== $booking->id) {
                    continue;
                }

                // Handle passport file upload
                if ($request->hasFile("passengers.{$index}.passport_file")) {
                    // Delete old file
                    if ($passenger->passport_file) {
                        Storage::disk('public')->delete($passenger->passport_file);
                    }
                    // Store new file
                    $passenger->passport_file = $request->file("passengers.{$index}.passport_file")
                        ->store('passengers/passports', 'public');
                }

                // Handle insurance file upload
                if ($request->hasFile("passengers.{$index}.insurance_file")) {
                    // Delete old file
                    if ($passenger->insurance_file) {
                        Storage::disk('public')->delete($passenger->insurance_file);
                    }
                    // Store new file
                    $passenger->insurance_file = $request->file("passengers.{$index}.insurance_file")
                        ->store('passengers/insurance', 'public');
                }

                // Update passenger
                $passenger->update([
                    'first_name' => $passengerData['first_name'],
                    'last_name' => $passengerData['last_name'],
                    'date_of_birth' => $passengerData['date_of_birth'] ?? null,
                    'gender' => $passengerData['gender'] ?? null,
                    'nationality' => $passengerData['nationality'] ?? null,
                    'passport_number' => $passengerData['passport_number'] ?? null,
                    'passport_expiry_date' => $passengerData['passport_expiry_date'] ?? null,
                    'phone' => $passengerData['phone'] ?? null,
                    'email' => $passengerData['email'] ?? null,
                    'special_requirements' => $passengerData['special_requirements'] ?? null,
                ]);
            }

            return redirect()->route('user.bookings.details', ['id' => $booking->id])
                ->with('success', __('translate.Passenger information updated successfully.'));

        } catch (\Exception $e) {
            return back()
                ->with('error', __('translate.Error updating passenger information. Please try again.'))
                ->withInput();
        }
    }
}
