<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

       /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // No longer converting textarea to array here as we use a structured repeater
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'location' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:30',
            'longitude' => 'nullable|string|max:30',
            'service_type_id' => 'required|exists:service_types,id',
            'destination_id' => 'nullable',
            'destination_ids' => 'nullable|array',
            'destination_ids.*' => 'exists:destinations,id',
            'price_per_person' => 'nullable|numeric|min:0',
            'adult_price' => 'nullable|numeric|min:0',
            'adult_discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_adult_price' => 'nullable|numeric|min:0|lte:adult_price',
            'child_price' => 'nullable|numeric|min:0',
            'child_discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_child_price' => 'nullable|numeric|min:0|lte:child_price',
            'full_price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lte:full_price',
            'infant_price' => 'nullable|numeric|min:0',
            'security_deposit' => 'nullable|numeric|min:0',
            'deposit_required' => 'nullable|boolean',
            'deposit_percentage' => 'nullable|integer|min:0|max:100',
            'included' => 'nullable|array',
            'included.*.category' => 'nullable|string|max:50',
            'included.*.title' => 'nullable|string|max:255',
            'included.*.details' => 'nullable|string',
            'included.*.dietary' => 'nullable|array',
            'excluded' => 'nullable|array',
            'excluded.*.category' => 'nullable|string|max:50',
            'excluded.*.title' => 'nullable|string|max:255',
            'excluded.*.details' => 'nullable|string',
            'duration' => 'nullable|string|max:100',
            'group_size' => 'nullable|string|max:100',
            'age_range' => 'nullable|string|max:100',
            'languages' => 'nullable|array',
            'ticket' => 'nullable|string|max:255',
            'amenities' => 'nullable|array',
            'facilities' => 'nullable|array',
            'rules' => 'nullable|array',
            'safety' => 'nullable|array',
            'cancellation_policy' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
            'show_on_homepage' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'is_new' => 'nullable|boolean',
            'video_url' => 'nullable|url|max:255',
            'social_links' => 'nullable|array',
            'user_id' => 'nullable|exists:users,id',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_keywords' => 'nullable|string|max:255',
            'lang_code' => 'nullable|string|exists:languages,lang_code',
            'tour_plan_sub_title' => 'nullable|max:255',
            'map_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'good_to_know' => 'nullable|array',
            'guaranteed_departure' => 'nullable|boolean',
        ];

        if ($this->isMethod('POST')) {
            $rules['slug'] = 'nullable|string|unique:services,slug|max:255';
        } else {
            $rules['slug'] = [
                'nullable',
                'string',
                'max:255',
                Rule::unique('services', 'slug')->ignore($this->route('service')),
            ];
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => trans('translate.Title is required'),
            'service_type_id.required' => trans('translate.Service type is required'),
            'service_type_id.exists' => trans('translate.Invalid service type'),
            'slug.unique' => trans('translate.Slug already exists'),
            'price_per_person.numeric' => trans('translate.Price must be a valid number'),
            'full_price.numeric' => trans('translate.Price must be a valid number'),
            'discount_price.numeric' => trans('translate.Price must be a valid number'),
            'email.email' => trans('translate.Invalid email format'),
            'video_url.url' => trans('translate.Invalid URL format'),
            'website.url' => trans('translate.Invalid URL format'),
            'included.array' => 'The included field must contain valid items.',
            'excluded.array' => 'The excluded field must contain valid items.',
            'included.*.string' => 'Each included item must be text.',
            'excluded.*.string' => 'Each excluded item must be text.',
            'included.*.max' => 'Each included item cannot exceed 255 characters.',
            'excluded.*.max' => 'Each excluded item cannot exceed 255 characters.',
        ];
    }
}
