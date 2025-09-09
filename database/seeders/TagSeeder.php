<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name_en' => 'Creative web design',
                'name_ar' => 'تصميم مواقع إبداعي',
                'description_en' => 'Innovative and visually stunning website designs.',
                'description_ar' => 'تصاميم مواقع مبتكرة وجذابة بصريًا.',
                
            ],
            [
                'name_en' => 'Web development',
                'name_ar' => 'تطوير المواقع',
                'description_en' => 'Professional and scalable web development solutions.',
                'description_ar' => 'حلول تطوير مواقع احترافية وقابلة للتوسع.',
                
                //service_id
                'service_id' => 2,
                //blog_id
                'blog_id' => 1,
            ],
            [
                'name_en' => 'Copywriting',
                'name_ar' => 'كتابة المحتوى',
                'description_en' => 'Compelling copy that resonates with your audience.',
                'description_ar' => 'كتابة محتوى جذاب يتوافق مع جمهورك.',
                
                //service_id
                'service_id' => 1,
                //blog_id
                'blog_id' => 2,
            ],
            [
                'name_en' => 'E-Commerce',
                'name_ar' => 'التجارة الإلكترونية',
                'description_en' => 'Custom online stores to boost your sales.',
                'description_ar' => 'متاجر إلكترونية مخصصة لزيادة مبيعاتك.',
                
                //service_id
                'service_id' => 2,
                //blog_id
                'blog_id' => 1,
            ],
            [
                'name_en' => 'WordPress',
                'name_ar' => 'ووردبريس',
                'description_en' => 'Flexible and easy-to-manage WordPress websites.',
                'description_ar' => 'مواقع ووردبريس مرنة وسهلة الإدارة.',
                
                //service_id
                'service_id' => 2,

            ],
            [
                'name_en' => 'Brand strategy',
                'name_ar' => 'استراتيجية العلامة التجارية',
                'description_en' => 'Strategic planning to grow your brand.',
                'description_ar' => 'تخطيط استراتيجي لنمو علامتك التجارية.',
                
                //service_id
                'service_id' => 3,

            ],
            [
                'name_en' => 'Tone of voice',
                'name_ar' => 'أسلوب الكتابة',
                'description_en' => 'Defining your brand’s unique communication style.',
                'description_ar' => 'تحديد أسلوب الاتصال الفريد لعلامتك التجارية.',
                
                //service_id
                'service_id' => 1,
            ],
            [
                'name_en' => 'Visual identity',
                'name_ar' => 'الهوية البصرية',
                'description_en' => 'Creating a memorable visual brand identity.',
                'description_ar' => 'إنشاء هوية بصرية مميزة للعلامة التجارية.',
                
                //service_id
                'service_id' => 3,
            ],
            [
                'name_en' => 'Motion graphics',
                'name_ar' => 'الرسوم المتحركة',
                'description_en' => 'Engaging motion graphics to tell your story.',
                'description_ar' => 'رسوم متحركة جذابة لعرض قصتك.',
                
                //service_id
                'service_id' => 3,
            ],
            [
                'name_en' => 'Creative campaigns',
                'name_ar' => 'حملات إبداعية',
                'description_en' => 'Unique campaigns that capture attention.',
                'description_ar' => 'حملات مميزة تلفت الانتباه.',
                
                //service_id
                'service_id' => 1,
            ],
            [
                'name_en' => 'Marketing support',
                'name_ar' => 'الدعم التسويقي',
                'description_en' => 'Ongoing marketing assistance to grow your business.',
                'description_ar' => 'دعم تسويقي مستمر لتنمية أعمالك.',
                
                //service_id
                'service_id' => 1,
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
