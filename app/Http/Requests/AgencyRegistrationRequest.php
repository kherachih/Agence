<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgencyRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'agency_name' => 'required|string|max:255',
            'agency_slug' => 'required|string|max:255|unique:agency_applications,agency_slug|unique:users,agency_slug',
            'email' => 'required|email|max:255|unique:agency_applications,email|unique:users,email',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'about_agency' => 'required|string',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'website' => 'nullable|url|max:255',
            'location_map' => 'nullable|url',
            'facebook' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',

            // Documents - Required
            'agency_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'business_license' => 'required|file|mimes:pdf,jpeg,png,jpg|max:5120',
            'id_document' => 'required|file|mimes:pdf,jpeg,png,jpg|max:5120',

            // Documents - Optional
            'tax_certificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:5120',
            'insurance_document' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:5120',
            'other_documents.*' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:5120',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'agency_name.required' => __('translate.Agency name is required'),
            'agency_slug.required' => __('translate.Agency slug is required'),
            'agency_slug.unique' => __('translate.This agency slug is already taken'),
            'email.required' => __('translate.Email is required'),
            'email.email' => __('translate.Please provide a valid email address'),
            'email.unique' => __('translate.This email is already registered'),
            'phone.required' => __('translate.Phone number is required'),
            'password.required' => __('translate.Password is required'),
            'password.min' => __('translate.Password must be at least 6 characters'),
            'password.confirmed' => __('translate.Password confirmation does not match'),
            'about_agency.required' => __('translate.Agency description is required'),
            'country.required' => __('translate.Country is required'),
            'state.required' => __('translate.State is required'),
            'city.required' => __('translate.City is required'),
            'address.required' => __('translate.Address is required'),

            'agency_logo.required' => __('translate.Agency logo is required'),
            'agency_logo.image' => __('translate.Logo must be an image'),
            'agency_logo.max' => __('translate.Logo size must not exceed 2MB'),

            'business_license.required' => __('translate.Business license document is required'),
            'business_license.mimes' => __('translate.Business license must be PDF or image'),
            'business_license.max' => __('translate.Business license size must not exceed 5MB'),

            'id_document.required' => __('translate.ID document is required'),
            'id_document.mimes' => __('translate.ID document must be PDF or image'),
            'id_document.max' => __('translate.ID document size must not exceed 5MB'),
        ];
    }
}
