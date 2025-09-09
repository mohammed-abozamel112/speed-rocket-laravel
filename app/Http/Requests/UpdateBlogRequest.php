<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
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
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'short_description_ar' => 'nullable|string',
            'short_description_en' => 'nullable|string',
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => [
                'required',
                Rule::in(['draft', 'published']),
            ],
            'user_id' => 'nullable|exists:users,id',
        ];
    }
}
