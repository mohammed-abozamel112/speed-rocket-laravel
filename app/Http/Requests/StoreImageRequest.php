<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreImageRequest extends FormRequest
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
            'name_ar' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',
            'alt_text_ar' => 'nullable|string|max:255',
            'alt_text_en' => 'nullable|string|max:255',
            'short_description_ar' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string|max:255',
            /*
              // caption ar and en
            $table->text('caption_ar')->nullable();
            $table->text('caption_en')->nullable();
            */
            'caption_ar' => 'nullable|string',
            'caption_en' => 'nullable|string',
            'type_ar' => [
                'required',
                Rule::in(['مدونه', 'خدمة', 'معرض', 'ملف شخصي', 'عميل', 'أعمال', 'الرئيسية', 'حول','تواصل','فريق']),
            ],
            'type_en' => [
                'required',
                Rule::in(['blog', 'service', 'gallery', 'profile', 'client', 'works', 'home', 'about','contact','team']),
            ],
            'service_id' => 'nullable|exists:services,id',
            'blog_id' => 'nullable|exists:blogs,id',
            'tag_id' => 'nullable|exists:tags,id',
        ];
    }
}
