<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* create this services web development, marketing, branding
         'name_ar',
        'name_en',
        'short_description_ar',
        'short_description_en',
        'sub_title1_ar',
        'sub_title1_en',
        'sub_title2_ar',
        'sub_title2_en',
        'sub_title3_ar',
        'sub_title3_en',
        'description1_ar',
        'description1_en',
        'description2_ar',
        'description2_en',
        'description3_ar',
        'description3_en',
        'image',
        'status',
        'order',
        'price',
         */
        $services = [
            [
                'name_ar' => 'التسويق',
                'name_en' => 'Marketing',
                'short_description_ar' => 'خدمات تسويق رقمية متكاملة.',
                'short_description_en' => 'Comprehensive digital marketing services.',
                'sub_title1_ar' => 'استراتيجيات فعالة',
                'sub_title1_en' => 'Effective Strategies',
                'sub_title2_ar' => 'إعلانات مستهدفة',
                'sub_title2_en' => 'Targeted Ads',
                'sub_title3_ar' => 'تحليل النتائج',
                'sub_title3_en' => 'Results Analysis',
                'description1_ar' => 'نضع خطط تسويقية مخصصة.',
                'description1_en' => 'We create customized marketing plans.',
                'description2_ar' => 'ننفذ حملات إعلانية ناجحة.',
                'description2_en' => 'We run successful ad campaigns.',
                'description3_ar' => 'نحلل النتائج لتحسين الأداء.',
                'description3_en' => 'We analyze results to improve performance.',
                'image' => 'marketing.jpg',
                'status' => 1,
                'price' => 3000,
            ],
            [
                'name_ar' => 'تطوير الويب',
                'name_en' => 'Web Development',
                'short_description_ar' => 'خدمة تطوير مواقع إلكترونية احترافية.',
                'short_description_en' => 'Professional website development service.',
                'sub_title1_ar' => 'تصميم حديث',
                'sub_title1_en' => 'Modern Design',
                'sub_title2_ar' => 'تطوير سريع',
                'sub_title2_en' => 'Fast Development',
                'sub_title3_ar' => 'دعم فني',
                'sub_title3_en' => 'Technical Support',
                'description1_ar' => 'نستخدم أحدث التقنيات لتصميم مواقع جذابة.',
                'description1_en' => 'We use the latest technologies to design attractive websites.',
                'description2_ar' => 'نلتزم بسرعة التنفيذ.',
                'description2_en' => 'We ensure fast delivery.',
                'description3_ar' => 'نوفر دعم فني مستمر.',
                'description3_en' => 'We provide continuous technical support.',
                'image' => 'web-development.jpg',
                'status' => 1,
                'price' => 5000,
            ],

            [
                'name_ar' => 'العلامة التجارية',
                'name_en' => 'Branding',
                'short_description_ar' => 'بناء هوية تجارية قوية.',
                'short_description_en' => 'Building a strong brand identity.',
                'sub_title1_ar' => 'تصميم شعار',
                'sub_title1_en' => 'Logo Design',
                'sub_title2_ar' => 'هوية بصرية',
                'sub_title2_en' => 'Visual Identity',
                'sub_title3_ar' => 'توجيه العلامة',
                'sub_title3_en' => 'Brand Guidance',
                'description1_ar' => 'نصمم شعارات احترافية.',
                'description1_en' => 'We design professional logos.',
                'description2_ar' => 'نطور هوية بصرية متكاملة.',
                'description2_en' => 'We develop a complete visual identity.',
                'description3_ar' => 'نقدم استشارات لتقوية العلامة.',
                'description3_en' => 'We provide consultations to strengthen your brand.',
                'image' => 'branding.jpg',
                'status' => 1,
                'price' => 4000,
            ]
        ];
        foreach ($services as $index => $service) {
            // Ensure the image path is stored relative, not as a full URL
            $service['image'] = 'services/' . $service['image'];
            Service::create($service);
        }

    }
}
