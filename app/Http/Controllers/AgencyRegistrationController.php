<?php

namespace App\Http\Controllers;

use App\Models\AgencyApplication;
use App\Http\Requests\AgencyRegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

class AgencyRegistrationController extends Controller
{
    /**
     * Show the agency registration form
     * Note: $general_setting and $footer are automatically injected by AppServiceProvider
     */
    public function showRegistrationForm()
    {
        return view('agency_registration.register');
    }

    /**
     * Handle the agency registration submission
     */
    public function submitApplication(AgencyRegistrationRequest $request)
    {
        try {
            // Create the application
            $application = new AgencyApplication();
            $application->agency_name = $request->agency_name;
            $application->agency_slug = $request->agency_slug;
            $application->email = $request->email;
            $application->phone = $request->phone;
            $application->password = Hash::make($request->password);
            $application->about_agency = $request->about_agency;
            $application->country = $request->country;
            $application->state = $request->state;
            $application->city = $request->city;
            $application->address = $request->address;
            $application->website = $request->website;
            $application->location_map = $request->location_map;
            $application->facebook = $request->facebook;
            $application->linkedin = $request->linkedin;
            $application->twitter = $request->twitter;
            $application->instagram = $request->instagram;
            $application->status = 'pending';

            // Handle Agency Logo Upload
            if ($request->hasFile('agency_logo')) {
                $application->agency_logo = $this->uploadFile($request->file('agency_logo'), 'agency_logo', $request->agency_slug);
            }

            // Handle Business License Upload
            if ($request->hasFile('business_license')) {
                $application->business_license = $this->uploadFile($request->file('business_license'), 'business_license', $request->agency_slug);
            }

            // Handle ID Document Upload
            if ($request->hasFile('id_document')) {
                $application->id_document = $this->uploadFile($request->file('id_document'), 'id_document', $request->agency_slug);
            }

            // Handle Tax Certificate Upload
            if ($request->hasFile('tax_certificate')) {
                $application->tax_certificate = $this->uploadFile($request->file('tax_certificate'), 'tax_certificate', $request->agency_slug);
            }

            // Handle Insurance Document Upload
            if ($request->hasFile('insurance_document')) {
                $application->insurance_document = $this->uploadFile($request->file('insurance_document'), 'insurance_document', $request->agency_slug);
            }

            // Handle Other Documents Upload
            if ($request->hasFile('other_documents')) {
                $otherDocs = [];
                foreach ($request->file('other_documents') as $index => $file) {
                    $otherDocs[] = $this->uploadFile($file, 'other_document_' . $index, $request->agency_slug);
                }
                $application->other_documents = $otherDocs;
            }

            $application->save();

            // Send confirmation email to agency
            try {
                \Mail::to($application->email)->send(new \App\Mail\AgencyApplicationSubmitted($application));
            } catch (\Exception $e) {
                // Log email error but don't fail the application submission
                \Log::error('Failed to send agency application confirmation email: ' . $e->getMessage());
            }

            $notify_message = trans('translate.Your agency registration has been submitted successfully. We will review your application and contact you soon.');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        } catch (\Exception $e) {
            $notify_message = trans('translate.Something went wrong. Please try again.');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->withInput()->with($notify_message);
        }
    }

    /**
     * Upload a file and return the path
     */
    private function uploadFile($file, $prefix, $slug)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::slug($slug) . '-' . $prefix . '-' . now()->format('YmdHis') . '-' . rand(1000, 9999) . '.' . $extension;
        $filePath = 'uploads/agency-applications/' . $fileName;

        // If it's an image, use Image facade
        if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
            Image::make($file)->save(public_path($filePath));
        } else {
            // For PDFs and other files, use move
            $file->move(public_path('uploads/agency-applications'), $fileName);
        }

        return $filePath;
    }
}
