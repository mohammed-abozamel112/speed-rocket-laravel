<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
             'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'short_description_ar' => 'required|string|max:500',
            'short_description_en' => 'required|string|max:500',
            'sub_title1_ar' => 'nullable|string|max:255',
            'sub_title1_en' => 'nullable|string|max:255',
            'sub_title2_ar' => 'nullable|string|max:255',
            'sub_title2_en' => 'nullable|string|max:255',
            'sub_title3_ar' => 'nullable|string|max:255',
            'sub_title3_en' => 'nullable|string|max:255',
            'description1_ar' => 'nullable|string',
            'description1_en' => 'nullable|string',
            'description2_ar' => 'nullable|string',
            'description2_en' => 'nullable|string',
            'description3_ar' => 'nullable|string',
            'description3_en' => 'nullable|string',
            'image' => 'nullable|file|image|max:100048',
            'status' => 'boolean',
            'price' => 'nullable|numeric|min:0',
        ];
    }
}
