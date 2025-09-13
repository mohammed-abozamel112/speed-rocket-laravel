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

         */
        $services = [
            [
                'name_ar' => 'خدمات الشركات والتجار',
                'name_en' => 'Business & Traders Services',
                'short_description_ar' => 'اعقد صفقتك التجارية عن بعد مع خدمات الاستيراد المتخصصة من الصين',
                'short_description_en' => 'Secure your business deals remotely with our expert import services from China',

                'sub_title1_ar' => 'أفضل أسعار لصفقات الاستيراد',
                'sub_title1_en' => 'Best Pricing for Import Deals',
                'sub_title2_ar' => 'شبكة علاقات تجارية قوية',
                'sub_title2_en' => 'Strong Business Network',
                'sub_title3_ar' => 'توفير الوقت والجهد في الاستيراد',
                'sub_title3_en' => 'Save Time and Effort in Importing',

                'description1_ar' => 'في سبيد روكيت، نتخصص في خدمات الاستيراد التي تضمن نجاح الصفقات التجارية. تحليلنا التفصيلي للسوق والخبرة في التفاوض توفر لك أفضل التكاليف الممكنة لاستيراد المنتجات من الصين، مما يعظم هوامش الربح الخاصة بك.',
                'description1_en' => 'At Speed Rocket, we specialize in import services that ensure successful business deals. Our detailed market analysis and negotiation expertise provide you with the best possible costs for importing products from China, maximizing your profit margins.',

                'description2_ar' => 'من خلال شبكتنا الواسعة من المنظمات والمؤسسات والشركات، نضمن تحقيق المعادلة المثالية بين أقل التكاليف وأعلى الأرباح في عمليات الاستيراد من الصين.',
                'description2_en' => 'With our extensive network of organizations, institutions, and companies, we ensure the perfect balance of lowest costs and highest profits in importing from China.',

                'description3_ar' => 'وفر تكاليف السفر والبحث، ودعنا نتولى هذه المهمة. فقط اختر منتجك، ونحن نضمن لك التميز في خدمات الاستيراد الشخصية والتجارية.',
                'description3_en' => 'Save on travel and research costs by letting us handle the import process. Choose your product, and we guarantee excellence in personal and business import services.',

                'image' => 'business.jpg',
                'status' => true,
            ],
            [
                'name_ar' => 'خدمات الأفراد',
                'name_en' => 'Individual Services',
                'short_description_ar' => 'استيراد شخصي من الصين بأسعار الجملة – خصص طلبك ووفر المزيد مع خدمات الاستيراد المتخصصة',
                'short_description_en' => 'Personal import from China at wholesale prices – Customize your order and save more with expert import services',

                'sub_title1_ar' => 'منتجات عالية الجودة من الصين',
                'sub_title1_en' => 'High-Quality Products from China',
                'sub_title2_ar' => 'أسعار الجملة المباشرة',
                'sub_title2_en' => 'Direct Wholesale Pricing',
                'sub_title3_ar' => 'مصمم خصيصًا لاحتياجاتك',
                'sub_title3_en' => 'Tailored to Your Personal Needs',

                'description1_ar' => 'نضمن حصولك على منتجات عالية الجودة مباشرة من الصين بسعر الجملة، من خلال خدمات الاستيراد الشخصية المتخصصة التي توفر أفضل العروض.',
                'description1_en' => 'We ensure you receive high-quality products directly from China at wholesale prices through our specialized personal import services that offer the best deals.',

                'description2_ar' => 'عبر خدمة الاستيراد الشخصي من سبيد روكيت، المصممة خصيصًا لتلبية احتياجات الأفراد والمشاريع الناشئة، مع التركيز على الجودة والتوفير.',
                'description2_en' => 'Through Speed Rocket’s personal import service, specially designed to meet the needs of individuals and startups, focusing on quality and savings.',

                'description3_ar' => 'سواء كنت فردًا تبحث عن منتجات فريدة أو صاحب مشروع ناشئ يريد استيراد بكفاءة، خدماتنا تغطي جميع احتياجات الاستيراد الشخصي من الصين.',
                'description3_en' => 'Whether you’re an individual seeking unique products or a startup owner looking to import efficiently, our services cover all personal import needs from China.',

                'image' => 'individual.jpg',
                'status' => true,
            ],


        ];
        foreach ($services as $index => $service) {
            // Ensure the image path is stored relative, not as a full URL
            $service['image'] = 'services/' . $service['image'];
            Service::create($service);
        }

    }
}
