<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'rating' => 'required|integer|between:1,5',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'review_ar' => 'required|string|max:1000',
            'review_en' => 'required|string|max:1000',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:4048', // Optional image validation
            'email' => 'nullable|email|max:255', // Optional email validation
        ];
    }
}
