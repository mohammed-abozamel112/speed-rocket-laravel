<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $blogs = [
            [
                'title_ar' => 'تطوير الويب',
                'title_en' => 'Web Development',
                'short_description_ar' => 'وصف قصير لتطوير الويب',
                'short_description_en' => 'Short description of Web Development',
                'sub_title1_ar' => 'مقدمة في تطوير الويب',
                'sub_title1_en' => 'Introduction to Web Development',
                'sub_title2_ar' => 'أدوات وتقنيات تطوير الويب',
                'sub_title2_en' => 'Web Development Tools and Techniques',
                'sub_title3_ar' => 'أفضل الممارسات في تطوير الويب',
                'sub_title3_en' => 'Best Practices in Web Development',
                'description1_ar' => 'تفاصيل حول مقدمة تطوير الويب.',
                'description1_en' => 'Details about Introduction to Web Development.',
                'description2_ar' => 'تفاصيل حول أدوات وتقنيات تطوير الويب.',
                'description2_en' => 'Details about Web Development Tools and Techniques.',
                'description3_ar' => 'تفاصيل حول أفضل الممارسات في تطوير الويب.',
                'description3_en' => 'Details about Best Practices in Web Development.',
                'image' => 'web_development.png',
                'status' => 'published',
            ],
            [
                'title_ar' => 'العلامة التجارية',
                'title_en' => 'Branding',
                'short_description_ar' => 'وصف قصير للعلامة التجارية',
                'short_description_en' => 'Short description of Branding',
                'sub_title1_ar' => 'مقدمة في العلامة التجارية',
                'sub_title1_en' => 'Introduction to Branding',
                'sub_title2_ar' => 'أدوات وتقنيات العلامة التجارية',
                'sub_title2_en' => 'Branding Tools and Techniques',
                'sub_title3_ar' => 'أفضل الممارسات في العلامة التجارية',
                'sub_title3_en' => 'Best Practices in Branding',
                'description1_ar' => 'تفاصيل حول مقدمة العلامة التجارية.',
                'description1_en' => 'Details about Introduction to Branding.',
                'description2_ar' => 'تفاصيل حول أدوات وتقنيات العلامة التجارية.',
                'description2_en' => 'Details about Branding Tools and Techniques.',
                'description3_ar' => 'تفاصيل حول أفضل الممارسات في العلامة التجارية.',
                'description3_en' => 'Details about Best Practices in Branding.',
                'image' => 'branding.png',
                'status' => 'published',
            ],
        ];
        foreach ($blogs as $blog) {
            $blog['image'] = 'blogs/' . $blog['image'];
            Blog::create($blog);
        }
    }
}
