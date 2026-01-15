<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgencyApplication;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;

class AgencyApplicationController extends Controller
{
    /**
     * Display a listing of agency applications
     */
    public function index(Request $request)
    {
        $query = AgencyApplication::with('reviewer', 'user')->latest();

        // Filter by status if provided
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        $applications = $query->paginate(20);
        $pending_count = AgencyApplication::pending()->count();
        $approved_count = AgencyApplication::approved()->count();
        $rejected_count = AgencyApplication::rejected()->count();

        return view('admin.agency_applications.index', compact(
            'applications',
            'pending_count',
            'approved_count',
            'rejected_count'
        ));
    }

    /**
     * Display the specified agency application
     */
    public function show($id)
    {
        $application = AgencyApplication::with('reviewer', 'user')->findOrFail($id);

        return view('admin.agency_applications.show', compact('application'));
    }

    /**
     * Approve an agency application
     */
    public function approve(Request $request, $id)
    {
        $request->validate([
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $application = AgencyApplication::findOrFail($id);

        if ($application->status === 'approved') {
            $notify_message = trans('translate.This application has already been approved');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'warning');
            return redirect()->back()->with($notify_message);
        }

        try {
            // Create a new user account for the agency
            $user = new User();
            $user->name = $application->agency_name;
            $user->email = $application->email;
            $user->phone = $application->phone;
            $user->password = $application->password; // Already hashed
            $user->username = $application->agency_slug;
            $user->is_seller = 1;
            $user->status = 'enable';
            $user->is_banned = 'no';
            $user->email_verified_at = now();

            // Agency information
            $user->agency_name = $application->agency_name;
            $user->agency_slug = $application->agency_slug;
            $user->agency_logo = $application->agency_logo;
            $user->about_me = $application->about_agency;

            // Location
            $user->country = $application->country;
            $user->state = $application->state;
            $user->city = $application->city;
            $user->address = $application->address;

            // Additional info
            $user->website = $application->website;
            $user->location_map = $application->location_map;

            // Social media
            $user->facebook = $application->facebook;
            $user->linkedin = $application->linkedin;
            $user->twitter = $application->twitter;
            $user->instagram = $application->instagram;

            // Set as approved agency
            $user->instructor_joining_request = 'approved';

            $user->save();

            // Update application status
            $application->status = 'approved';
            $application->admin_notes = $request->admin_notes;
            $application->reviewed_by = Auth::guard('admin')->user()->id;
            $application->reviewed_at = now();
            $application->user_id = $user->id;
            $application->save();

            // Send approval email to agency with login credentials
            try {
                // Note: Password is already hashed in DB, we can't send it
                // In a production environment, you might want to generate a temporary password
                \Mail::to($application->email)->send(new \App\Mail\AgencyApplicationApproved($application, $user, null));
            } catch (\Exception $e) {
                \Log::error('Failed to send agency approval email: ' . $e->getMessage());
            }

            $notify_message = trans('translate.Agency application approved successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->route('admin.agency-applications.index')->with($notify_message);

        } catch (\Exception $e) {
            $notify_message = trans('translate.Something went wrong. Please try again.');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }
    }

    /**
     * Reject an agency application
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'admin_notes' => 'required|string|max:1000',
        ], [
            'admin_notes.required' => trans('translate.Please provide a reason for rejection'),
        ]);

        $application = AgencyApplication::findOrFail($id);

        if ($application->status === 'rejected') {
            $notify_message = trans('translate.This application has already been rejected');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'warning');
            return redirect()->back()->with($notify_message);
        }

        if ($application->status === 'approved') {
            $notify_message = trans('translate.Cannot reject an approved application');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        // Update application status
        $application->status = 'rejected';
        $application->admin_notes = $request->admin_notes;
        $application->reviewed_by = Auth::guard('admin')->user()->id;
        $application->reviewed_at = now();
        $application->save();

        // Send rejection email to agency
        try {
            \Mail::to($application->email)->send(new \App\Mail\AgencyApplicationRejected($application, $request->admin_notes));
        } catch (\Exception $e) {
            \Log::error('Failed to send agency rejection email: ' . $e->getMessage());
        }

        $notify_message = trans('translate.Agency application rejected');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.agency-applications.index')->with($notify_message);
    }

    /**
     * Remove the specified application from storage
     */
    public function destroy($id)
    {
        $application = AgencyApplication::findOrFail($id);

        // Delete uploaded files
        $this->deleteApplicationFiles($application);

        $application->delete();

        $notify_message = trans('translate.Application deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.agency-applications.index')->with($notify_message);
    }

    /**
     * Delete all files associated with an application
     */
    private function deleteApplicationFiles($application)
    {
        $files = [
            $application->agency_logo,
            $application->business_license,
            $application->id_document,
            $application->tax_certificate,
            $application->insurance_document,
        ];

        foreach ($files as $file) {
            if ($file && file_exists(public_path($file))) {
                unlink(public_path($file));
            }
        }

        // Delete other documents
        if ($application->other_documents) {
            foreach ($application->other_documents as $doc) {
                if ($doc && file_exists(public_path($doc))) {
                    unlink(public_path($doc));
                }
            }
        }
    }
}
