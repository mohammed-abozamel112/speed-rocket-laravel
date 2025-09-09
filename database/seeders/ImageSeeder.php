<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $images = [
            [
                'name_ar' => 'شركة فيد للتسويق',
                'name_en' => 'Fid Marketing Company',

                'image' => 'images/fid.png',
                'alt_text_ar' => 'نهج شركة فيد الاستراتيجي يحول رؤيتك إلى نجاح. نصوغ قصصًا مؤثرة لعلامتك التجارية، ونقدمها لجمهورك برؤى بيانات واستراتيجيات مبتكرة، ملتزمين بفهم احتياجاتك الفريدة وبناء اتصال دائم مع عملائك لتحقيق النمو والنجاح لعلامتك التجارية.
',
                'alt_text_en' => 'FID Marketing transforms your vision into success. We build compelling brand stories, using data-driven insights and innovative strategies to connect you with your audience, foster lasting customer relationships, and drive brand growth.',
                'short_description_ar' => 'نهج شركة فيد الاستراتيجي يحول رؤيتك إلى نجاح.',
                'short_description_en' => 'FID Marketing transforms your vision into success.',
                'caption_ar' => 'نهج شركة فيد الاستراتيجي يحول رؤيتك إلى نجاح. نصوغ قصصًا مؤثرة لعلامتك التجارية، ونقدمها لجمهورك برؤى بيانات واستراتيجيات مبتكرة، ملتزمين بفهم احتياجاتك الفريدة وبناء اتصال دائم مع عملائك لتحقيق النمو والنجاح لعلامتك التجارية.
',
                'caption_en' => 'FID Marketing transforms your vision into success. We build compelling brand stories, using data-driven insights and innovative strategies to connect you with your audience, foster lasting customer relationships, and drive brand growth.',
                'type_ar' => 'الرئيسية',
                'type_en' => 'home',
            ],
            [
                'name_ar' => 'جلسة استراتيجية التسويق',
                'name_en' => 'Marketing Strategy Session',

                'image' => asset('storage/' . 'marketing-strategy-session.jpg'),
                'alt_text_ar' => 'فريق FID أثناء وضع استراتيجية تسويق ناجحة',
                'alt_text_en' => 'FID team creating a successful marketing strategy',
                'short_description_ar' => 'جلسة استراتيجية لتحديد أهداف التسويق.',
                'short_description_en' => 'Strategic session to define marketing goals.',
                'caption_ar' => 'فريق FID يناقش أفضل الاستراتيجيات لتحقيق نمو الأعمال.',
                'caption_en' => 'FID team discusses top strategies for business growth.',
                'type_ar' => 'حول',
                'type_en' => 'about',
            ],
            [
                'name_ar' => 'ورشة عمل الهوية البصرية',
                'name_en' => 'Branding Workshop',

                'image' => asset('storage/' . 'branding-workshop.jpg'),
                'alt_text_ar' => 'ورشة عمل لتطوير الهوية البصرية لعلامة تجارية',

                'alt_text_en' => 'Workshop focused on developing a visual brand identity',
                'short_description_ar' => 'ورشة عمل لتطوير الهوية البصرية لعلامة تجارية',
                'short_description_en' => 'Workshop focused on developing a visual brand identity',
                'caption_ar' => 'تصميم هوية مميزة تعكس رؤية العميل في FID.',
                'caption_en' => 'Designing a standout brand identity that reflects the client’s vision at FID.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'فريق تطوير الويب',
                'name_en' => 'Web Development Team',

                'image' => asset('storage/' . 'web-development-team.jpg'),
                'alt_text_ar' => 'فريق برمجة مواقع الويب في شركة FID',
                'alt_text_en' => 'FID’s web development team building custom websites',
                'short_description_ar' => 'فريق FID لتطوير الويب يبني مواقع مخصصة.',
                'short_description_en' => 'FID’s web development team builds custom websites.',
                'caption_ar' => 'تصميم وبرمجة مواقع متوافقة مع جميع الأجهزة.',
                'caption_en' => 'Responsive and custom website development by FID.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'حملة وسائل التواصل الاجتماعي',
                'name_en' => 'Social Media Campaign',

                'image' => asset('storage/' . 'social-media-campaign.jpg'),
                'alt_text_ar' => 'حملة إعلانية على فيسبوك وإنستغرام بواسطة FID',
                'alt_text_en' => 'Facebook and Instagram ad campaign by FID',
                'short_description_ar' => 'الوصول إلى جمهورك من خلال حملات فعالة على وسائل التواصل الاجتماعي.',
                'short_description_en' => 'Reaching your audience with targeted social media campaigns.',
                'caption_ar' => 'نصل إلى جمهورك المستهدف من خلال حملات فعالة.',
                'caption_en' => 'Reaching your audience with targeted social media campaigns.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'جلسة عصف ذهني إبداعية',
                'name_en' => 'Creative Brainstorming',

                'image' => asset('storage/' . 'creative-brainstorming.jpg'),
                'alt_text_ar' => 'فريق FID يناقش أفكار مبتكرة لمشروع تسويقي',
                'alt_text_en' => 'FID team brainstorming creative ideas for a marketing project',
                'short_description_ar' => 'نولد أفكارًا استثنائية لتحقيق تأثير قوي.',
                'short_description_en' => 'Generating exceptional ideas to make a lasting impact.',
                'caption_ar' => 'نولد أفكارًا استثنائية لتحقيق تأثير قوي.',
                'caption_en' => 'Generating exceptional ideas to make a lasting impact.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'تصميم واجهات المستخدم',
                'name_en' => 'UI/UX Design',

                'image' => asset('storage/' . 'ui-ux-design.jpg'),
                'alt_text_ar' => 'تصميم تجربة مستخدم احترافية من FID',
                'alt_text_en' => 'Professional user interface and experience design by FID',
                'short_description_ar' => 'تصميم واجهات جذابة وسهلة الاستخدام لزيادة التفاعل.',
                'short_description_en' => 'Crafting engaging and user-friendly interfaces to boost interaction.',
                'caption_ar' => 'نصمم واجهات جذابة وسهلة الاستخدام لزيادة التفاعل.',
                'caption_en' => 'Crafting engaging and user-friendly interfaces to boost interaction.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'فريق صناعة المحتوى',
                'name_en' => 'Content Creation Team',

                'image' => asset('storage/' . 'content-creation-team.jpg'),
                'alt_text_ar' => 'فريق FID أثناء إنتاج محتوى رقمي مخصص',
                'alt_text_en' => 'FID content team producing custom digital content',
                'short_description_ar' => 'نقدم محتوى قويًا يعبر عن علامتك التجارية.',
                'short_description_en' => 'Delivering compelling content that defines your brand.',
                'caption_ar' => 'نقدم محتوى قويًا يعبر عن علامتك التجارية.',
                'caption_en' => 'Delivering compelling content that defines your brand.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'تصميم شعار احترافي',
                'name_en' => 'Professional Logo Design',

                'image' => asset('storage/' . 'logo-design.jpg'),
                'alt_text_ar' => 'تصميم شعار فريد لعلامة تجارية ناشئة',
                'alt_text_en' => 'Creating a unique logo for a startup brand',
                'short_description_ar' => 'شعارات تترك انطباعًا يدوم طويلاً.',
                'short_description_en' => 'Logos that make a lasting impression.',
                'caption_ar' => 'شعارات تترك انطباعًا يدوم طويلاً.',
                'caption_en' => 'Logos that make a lasting impression.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'لوحة تحكم التحليلات',
                'name_en' => 'Analytics Dashboard',

                'image' => asset('storage/' . 'analytics-dashboard.jpg'),
                'alt_text_ar' => 'تحليل بيانات الحملة التسويقية عبر لوحة تحكم FID',
                'alt_text_en' => 'Campaign data analysis using FID’s dashboard',
                'short_description_ar' => 'مراقبة وتحليل أداء الحملات التسويقية.',
                'short_description_en' => 'Monitoring and analyzing marketing campaign performance.',
                'caption_ar' => 'نراقب الأداء لتحسين النتائج باستمرار.',
                'caption_en' => 'Monitoring performance for continuous improvement.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'تصميم تطبيق جوال',
                'name_en' => 'Mobile App Design',

                'image' => asset('storage/' . 'mobile-app-design.jpg'),
                'alt_text_ar' => 'تصميم تجربة استخدام لتطبيق جوال حديث',
                'alt_text_en' => 'Modern mobile app UX/UI design in progress',
                'short_description_ar' => 'تجربة استخدام متميزة على منصات iOS و Android.',
                'short_description_en' => 'Superior user experience on both iOS and Android platforms.',
                'caption_ar' => 'تجربة استخدام متميزة على منصات iOS و Android.',
                'caption_en' => 'Superior user experience on both iOS and Android platforms.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'تعاون الفريق',
                'name_en' => 'Team Collaboration',

                'image' => asset('storage/' . 'team-collaboration.jpg'),
                'alt_text_ar' => 'فريق FID يتعاون في تنفيذ مشروع إبداعي',
                'alt_text_en' => 'FID team collaborating on a creative project',
                'short_description_ar' => 'العمل الجماعي هو سر نجاح مشاريعنا.',
                'short_description_en' => 'Teamwork is the key to our project success.',
                'caption_ar' => 'العمل الجماعي هو سر نجاح مشاريعنا.',
                'caption_en' => 'Teamwork is the key to our project success.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
            [
                'name_ar' => 'عرض تقديمي للعميل',
                'name_en' => 'Client Presentation',

                'image' => asset('storage/' . 'client-presentation.jpg'),
                'alt_text_ar' => 'عرض تسويقي مقدم من FID لأحد العملاء',
                'alt_text_en' => 'FID presenting a marketing proposal to a client',
                'short_description_ar' => 'نقدم نتائج ملموسة تفوق توقعات العملاء.',
                'short_description_en' => 'Delivering measurable results that exceed client expectations.',
                'caption_ar' => 'نقدم نتائج ملموسة تفوق توقعات العملاء.',
                'caption_en' => 'Delivering measurable results that exceed client expectations.',
                'type_ar' => 'أعمال',
                'type_en' => 'works',
            ],
        ];
        foreach ($images as $img) {
            Image::create($img);
        }
    }
}
