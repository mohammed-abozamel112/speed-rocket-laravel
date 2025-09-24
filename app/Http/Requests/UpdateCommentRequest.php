<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
            'blog_id' => 'sometimes|exists:blogs,id',
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'comment' => 'sometimes|string',
            'rate' => 'sometimes|integer|min:1|max:5',
        ];
    }
}
