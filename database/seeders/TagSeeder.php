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
            // ✅ Tags for Service ID = 2 (خدمات الأفراد)
            [
                'name_ar' => 'تشطيبات المباني والديكور',
                'name_en' => 'Building Finishing & Decoration',
                'description_ar' => 'استورد مواد التشطيب والإضاءة والأرضيات والسيراميك والواجهات وكل قطع الديكور من الصين بأسعار منافسة.',
                'description_en' => 'Import finishing materials, lighting, flooring, ceramics, facades, and all decoration items from China at competitive prices.',
                'image' => 'finishing.jpg',
                'price' => 0,
                'service_id' => 2,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'الأثاث',
                'name_en' => 'Furniture',
                'description_ar' => 'أثاث منزلي، مكتبي أو فندقي بتصاميم خاصة وجودة عالية وأسعار منافسة من مصانع الصين.',
                'description_en' => 'Custom-designed residential, office, or hotel furniture with high quality and competitive pricing from Chinese factories.',
                'image' => 'furniture.jpg',
                'price' => 0,
                'service_id' => 2,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'السيارات وملحقاتها',
                'name_en' => 'Cars and Accessories',
                'description_ar' => 'استيراد سيارات جديدة أو مستعملة وقطع الغيار والاكسسوارات من موردين موثوقين.',
                'description_en' => 'Import new or used cars, spare parts, and accessories from trusted suppliers in China.',
                'image' => 'cars.jpg',
                'price' => 0,
                'service_id' => 2,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'شوب آند شيب',
                'name_en' => 'Shop & Ship',
                'description_ar' => 'خدمة شحن عالمية تمكّنك من التسوق من أي مكان وشحن البضائع إلى أكثر من 30 دولة.',
                'description_en' => 'Global shipping service that lets you shop and ship to over 30 countries with ease.',
                'image' => 'shop-and-ship.jpg',
                'price' => 0,
                'service_id' => 2,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Tags for Service ID = 1 (خدمات الشركات والتجار)
            [
                'name_ar' => 'خدمات استشارية وعروض أسعار',
                'name_en' => 'Consultation & Pricing Services',
                'description_ar' => 'تحليل طلبك وتقديم الاستشارات وأفضل العروض من مصانع الصين وتغطية الشحن والتخليص.',
                'description_en' => 'We analyze your request, provide expert consultation and the best offers from Chinese factories including shipping and clearance.',
                'image' => 'consultation.jpg',
                'price' => 0,
                'service_id' => 1,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'خدمات تصديرية',
                'name_en' => 'Export Services',
                'description_ar' => 'نساعد الشركات في التصدير والتمثيل أمام المستوردين والوصول الفعال للأسواق المستهدفة.',
                'description_en' => 'We support companies in export procedures, representation, and effective market access strategies.',
                'image' => 'export.jpg',
                'price' => 0,
                'service_id' => 1,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'الشحن البحري',
                'name_en' => 'Sea Freight',
                'description_ar' => 'خدمة شاملة للشحن البحري من الباب إلى الباب بدعم فني وخدمة التخليص.',
                'description_en' => 'Complete sea freight service from pickup to delivery, including clearance and documentation.',
                'image' => 'sea-freight.jpg',
                'price' => 0,
                'service_id' => 1,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'الشحن الجوي',
                'name_en' => 'Air Freight',
                'description_ar' => 'شحن جوي سريع مدعوم بشبكة عالمية وخدمة تخليص سلسة.',
                'description_en' => 'Fast air freight with global network support and seamless clearance services.',
                'image' => 'air-freight.jpg',
                'price' => 0,
                'service_id' => 1,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'خدمات التخليص الجمركي',
                'name_en' => 'Customs Clearance Services',
                'description_ar' => 'فريق متخصص في إنهاء كافة إجراءات التخليص بسرعة وكفاءة، ومعرفة شاملة بأنظمة الجمارك.',
                'description_en' => 'A specialized team handling all clearance procedures efficiently, with full knowledge of customs regulations.',
                'image' => 'customs.jpg',
                'price' => 0,
                'service_id' => 1,
                'blog_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
