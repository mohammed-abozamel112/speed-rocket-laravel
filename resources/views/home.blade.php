<x-master-layout>
    <x-slot name="head">
        <x-seo :title="app()->getLocale()==='en'?'Speed Rocket Company':'شركة سبيد روكت'" :description="__(
            'Welcome to Speed Rocket Company, your trusted partner for integrated import services from China. We ensure quality, efficiency, and competitive pricing for all your sourcing needs.',
        )" :keywords="'import, sourcing, China, logistics, customs, quality assurance, competitive pricing'" :canonical="url()->current()" :og-title="__('Home - Speed Rocket Company')"
            :og-description="__(
                'Welcome to Speed Rocket Company, your trusted partner for integrated import services from China. We ensure quality, efficiency, and competitive pricing for all your sourcing needs.',
            )" :og-image="asset('storage/logo.png')" :twitter-card="asset('storage/logo.png')" :twitter-site="'@SpeedRocketCo'" :twitter-creator="'@SpeedRocketCo'" />
    </x-slot>
    @php
        $isRtl = app()->getLocale() === 'ar';
    @endphp
    {{-- hero section --}}
    @php
        $img = $homeImages->first();

    @endphp
    <section id="hero" class="w-full h-auto min-h-screen relative overflow-hidden">
        {{-- Background Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#FCF7F8] via-white to-red-50"></div>

        <div class="relative z-10 container mx-auto px-4 pt-32 pb-16">
            <div class="max-w-6xl mx-auto">
                {{-- reverse in mobile view --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[70vh]">
                    {{-- Left Column - Content --}}
                    <div class="space-y-8 animate-fade-in-up order-2 sm:order-1">
                        {{-- Badge --}}
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#f59c00]/10 text-[#f59c00] text-sm font-medium">
                            <span class="w-2 h-2 bg-[#f59c00] rounded-full animate-pulse"></span>

                            {{ $img->name }}
                        </div>

                        {{-- Main Heading --}}
                        <h1 class="text-4xl p-0 m-0 text-[#f59c00] md:text-5xl lg:text-6xl font-bold">
                            {{-- name --}}
                            <span class="text-gray-900 block leading-normal">{{ $img->name }}</span>

                            <span
                                class="py-2 leading-normal bg-gradient-to-r from-[#f59c00] text-3xl sm:text-4xl to-[#002a4d] bg-clip-text text-transparent block">
                                {{ $img->short_description }}
                            </span>
                        </h1>

                        {{-- Subtitle --}}
                        <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed max-w-lg">
                            {{ $img->caption }}
                        </p>

                        {{-- Statistics --}}
                        <div class="grid grid-cols-3 gap-6 py-6 border-t border-gray-200 dark:border-slate-700">
                            <div>
                                <div class="text-2xl font-bold text-[#f59c00]">150+</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $isRtl ? 'مشاريع' : 'Projects' }}</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-[#f59c00]">98%</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $isRtl ? 'رضا العملاء' : 'Satisfaction' }}</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-[#f59c00]">8+</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">{{ $isRtl ? 'سنوات' : 'Years' }}
                                </div>
                            </div>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#portfolio"
                                class="bg-[#f59c00] hover:bg-[#002a4d] text-white text-center px-8 py-3 rounded-full text-lg font-medium transition-all duration-200 hover:shadow-xl hover:-translate-y-1 group">
                                {{ $isRtl ? 'عرض أعمالنا' : 'View Our Work' }}
                                <span class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform">&#8594;</span>
                            </a>
                            <a href="#about"
                                class="border-[#f59c00] text-[#f59c00] hover:bg-[#f59c00] text-center hover:text-white px-8 py-3 rounded-full text-lg font-medium transition-all duration-200 hover:shadow-lg group">
                                <span class="mr-2 h-5 w-5 overflow-hidden">&#9654;</span>
                                {{ $isRtl ? 'تعلم المزيد' : 'Learn More' }}
                            </a>
                        </div>

                        {{-- Trust Indicators --}}
                        {{--   <div class="pt-8">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Trusted by innovative companies</p>
                                <div class="flex items-center space-x-6 opacity-60">
                                    <div class="text-lg font-semibold text-gray-400">TechFlow</div>
                                    <div class="text-lg font-semibold text-gray-400">UrbanCo</div>
                                    <div class="text-lg font-semibold text-gray-400">EcoMarket</div>
                                    <div class="text-lg font-semibold text-gray-400">MedTech</div>
                                </div>
                            </div> --}}
                    </div>

                    {{-- Right Column - Visual Element --}}
                    <div class="relative order-1 sm:order-2">
                        {{-- Main Card --}}
                        <div
                            class="relative bg-white  rounded-3xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-500">
                            <div class="space-y-6">
                                {{-- Header --}}
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    </div>
                                    <div class="text-sm text-gray-400">
                                        {{ $img->name }}</div>
                                </div>

                                {{-- Content --}}
                                <div class="space-y-4">
                                    <div class="h-4 bg-gradient-to-r from-[#f59c00] to-[#002a4d] rounded w-3/4"></div>
                                    <div class="h-3 bg-gray-200 dark:bg-slate-600 rounded w-full"></div>
                                    <div class="h-3 bg-gray-200 dark:bg-slate-600 rounded w-5/6"></div>
                                    <div class="h-3 bg-gray-200 dark:bg-slate-600 rounded w-4/6"></div>

                                </div>

                                {{-- Mock Chart --}}
                                <div class="bg-gray-50 dark:bg-slate-700 rounded-lg p-4">
                                    {{--  <div class="flex items-end space-x-2 h-20">
                                        <div class="bg-[#f59c00] w-6 h-12 rounded-sm"></div>
                                        <div class="bg-[#002a4d] w-6 h-16 rounded-sm"></div>
                                        <div class="bg-[#c3c7c9] w-6 h-10 rounded-sm"></div>
                                        <div class="bg-[#f59c00] w-6 h-20 rounded-sm"></div>
                                        <div class="bg-[#002a4d] w-6 h-14 rounded-sm"></div>
                                        <div class="bg-[#c3c7c9] w-6 h-8 rounded-sm"></div>
                                    </div> --}}
                                    <img loading="lazy"
                                        class="w-full max-h-48 object-cover"onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                                        src="{{ asset('storage/' . $img->image) }}" alt="">
                                </div>
                            </div>
                        </div>

                        {{-- Floating Elements --}}
                        <div
                            class="absolute -top-6 -right-6 w-16 h-16 bg-gradient-to-r from-[#f59c00] to-[#002a4d] rounded-2xl flex items-center justify-center text-white font-bold text-xl animate-bounce">
                            <span>⚡</span>
                        </div>

                        <div
                            class="absolute -bottom-4 -left-4 w-12 h-12 bg-gradient-to-r from-[#f59c00] to-[#002a4d] rounded-xl flex items-center justify-center text-white font-bold animate-pulse">
                            <span>✨</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <a href="#about" class="absolute bottom-0 left-1/2 transform -translate-x-1/2 animate-bounce z-30">
            <div class="w-6 h-10 border-2 border-[#f59c00] rounded-full flex justify-center">
                <div class="w-1 h-3 bg-[#f59c00] rounded-full mt-2 animate-pulse"></div>
            </div>
        </a>
    </section>

    {{-- Dynamic About Us Section --}}
    <section id="about" class="min-h-screen h-auto">
        <div
            class="content-about ps-[120px] text-[#c7c7c7c9] select-none max-[1200px]:ps-20 max-[1050px]:ps-16 max-[950px]:text-center max-[950px]:px-[90px] max-[650px]:px-[50px] order-2 sm:order-1">
            <h1
                class="font-['Dancing Script',cursive] text-[clamp(2.5rem,4vw,6rem)] font-bold bg-gradient-to-r from-[#f59c00] to-[#f59c00] bg-clip-text text-transparent  mb-9 ps-2 max-[650px]:ps-0">
                {{ app()->getLocale() === 'en' ? 'About Us' : 'من نحن' }}
            </h1>
            <p class="text-[clamp(0.9rem,4vw,1.2rem)] pe-[100px] max-[1200px]:pe-10 max-[990px]:pe-0 pb-8">
                {{ app()->getLocale() === 'en' ? 'At Speed Rocket, we believe in efficiency and strive to provide fully integrated import services from China with the highest quality and best prices. Thanks to our extensive experience and strong relationships, we ensure fast and accurate management of all logistics and customs procedures—from the factory to your warehouse.' : 'في سبيد روكيت، نؤمن بالكفاءة ونسعى لتوفير خدمات استيراد متكاملة من الصين بأعلى جودة وأفضل سعر. بفضل خبرتنا الواسعة وعلاقاتنا القوية، نضمن لك إدارة سريعة ودقيقة لجميع الإجراءات اللوجستية والجمركية، من المصنع إلى مستودعك.' }}
            </p>
            <a href="{{ route('about', app()->getLocale()) }}"
                class="bg-[#f59c00] hover:bg-[#002a4d] text-white px-8 py-3 rounded-full text-lg font-medium transition-all duration-200 hover:shadow-xl hover:-translate-y-1 group">
                {{ app()->getLocale() === 'en' ? 'Explore More' : 'اكتشف المزيد' }}
            </a>
        </div>
        {{-- Dynamic About Images --}}
        <div class="stack order-1 sm:order-2 mt-12 sm:mt-0 ">
            @foreach ($aboutImages as $index => $image)
                <div class="pictures">
                    <img loading="lazy" src="{{ asset('storage/' . $image->image) }}"
                        onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                        alt="{{ $image->alt ?? 'About Us Image ' . ($index + 1) }}"
                        class="w-full h-full object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                </div>
            @endforeach
        </div>
    </section>


    {{-- about us --}}


    {{-- services section --}}
    <section
        class="w-full bg-transparent text-[#f59c00] mt-20 lg:mt-0 pt-16 bg-gradient-to-br from-[#FCF7F8] via-white to-red-50"
        id="services">
        {{-- section for services --}}
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div
                class="inline-flex items-center px-4 py-2 gap-2 rounded-full bg-[#f59c00]/10 text-[#f59c00] text-sm font-medium mb-6">
                <span class="w-2 h-2 bg-[#f59c00] rounded-full animate-pulse"></span>
                {{ app()->getLocale() === 'en' ? 'Our Services' : 'خدماتنا' }}
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-[#f59c00] mb-6 capitalize">
                {{ app()->getLocale() === 'en' ? 'From Our Land…' : 'من أرضنا...' }}
                <span class="text-gradient block">
                    {{ app()->getLocale() === 'en' ? 'To Tables Around the World' : 'إلى موائد العالم' }}
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                {{ app()->getLocale() === 'en'
                    ? 'We believe every product has a story worth sharing.We import a diverse range of products from our trusted partners worldwide, leveraging professional expertise to ensure quality and strict compliance with standards. Our goal is to provide the best options for our clients from reliable sources with top-notch service.'
                    : 'نحن نؤمن أن لكل منتج قصة تستحق أن تُروى .نستورد مجموعة واسعة من المنتجات من شركائنا حول العالم، مع خبرة احترافية في ضمان الجودة والالتزام بأدق المعايير. نسعى لتوفير أفضل الخيارات لعملائنا من مصادر موثوقة وبأعلى مستويات الخدمة.' }}
            </p>
        </div>
        {{-- End Section Header --}}
        <div class="section">
            <div class="section-wrapper py-5">
                <div class="content-wrapper py-3">
                    @foreach ($services as $index => $service)
                        <div class="content content-{{ $index + 1 }}">
                            <div class="mobile-visual">
                                <img loading="lazy" class="card-img" src="{{ asset('storage/' . $service->image) }}"
                                    alt="{{ $service->name }}" />
                            </div>
                            <div class="meta">
                                <a
                                    href="{{ route('services.show', ['lang' => app()->getLocale(), 'service' => $service->slug]) }}">
                                    <h2 class="text-6xl text-break py-3">{{ $service->name }}</h2>
                                </a>
                                <p class="desc text-2xl text-gray-500 text-break p-2 text-justify">
                                    {{ $service->short_description }}</p>
                                <!-- tag links page -->
                                {{-- only for service selection --}}

                                {{-- tags max 3 per col --}}
                                <div class="my-2 py-5 grid grid-cols-3 gap-2" id="tags">

                                    @foreach ($service->tags as $tag)
                                        {{--  @php
                                        dd($tag)
                                    @endphp --}}
                                        <a href="{{ route('tags.show', ['lang' => app()->getLocale(), 'tag' => $tag->slug]) }}"
                                            class="border border-[#f3f3f3] hover:border-[#f59c00] text-[#f59c00]
          bg-gradient-to-br from-[#FCF7F8] via-white to-red-50
          hover:bg-none hover:bg-[#f59c00] hover:text-white
          px-3 py-3 rounded-full text-sm font-medium
          transition-all duration-700 ease-in-out    hover:shadow-lg group text-center"
                                            target="_self" rel="noopener noreferrer">
                                            {{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="visual">
                    <div class="card-wrapper">
                        @foreach ($services as $index => $service)
                            <div class="card card-{{ $index + 1 }}">
                                <img loading="lazy" class="card-img" src="{{ asset('storage/' . $service->image) }}"
                                    onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                                    alt="{{ $service['name'] }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- section for works --}}

    {{-- Portfolio Section --}}
    <section id="portfolio" class="w-full py-20 bg-gradient-to-br from-gray-50 to-white ">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                {{-- Section Header --}}
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center px-4 py-2 rounded-full gap-2 bg-[#f59c00]/10 text-[#f59c00] text-sm font-medium mb-6">
                        <span class="w-2 h-2 bg-[#f59c00] rounded-full animate-pulse"></span>
                        {{ app()->getLocale() === 'en' ? 'Our Portfolio' : 'أعمالنا' }}
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-[#f59c00] mb-6">
                        {{ app()->getLocale() === 'en' ? 'Catalogs of' : 'كتالوجات الشركات ' }}
                        <span
                            class="text-gradient">{{ app()->getLocale() === 'en' ? 'Our Partnered Companies' : 'التي نتعامل معها' }}</span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        {{ app()->getLocale() === 'en'
                            ? 'Browse the official catalogs of the companies and manufacturers we work with. Each catalog showcases trusted products backed by quality and years of industry expertise helping you make informed sourcing decisions.'
                            : 'نوفر لك مجموعة من الكتالوجات الرسمية للشركات والمصانع التي نتعامل معها، لتستعرض المنتجات المتاحة بكل سهولة. كل كتالوج يمثل جودة نثق بها، وخبرة ممتدة في مجالات متنوعة.' }}
                    </p>
                </div>
                {{-- create filter using project category --}}
                <div class="mb-8">
                    <div class="flex flex-wrap gap-2 w-full justify-center">
                        <button
                            class="px-4 py-2 rounded-full bg-[#f59c00]/10 text-[#f59c00] text-sm font-medium hover:bg-[#f59c00]/20 transition"
                            onclick="filterPortfolio('')">
                            {{ app()->getLocale() === 'en' ? 'All' : 'الكل' }}
                        </button>
                        @foreach ($portfolioProjects->pluck('category')->unique() as $category)
                            <button
                                class="px-4 py-2 rounded-full bg-[#f59c00]/10 text-[#f59c00] text-sm font-medium hover:bg-[#f59c00]/20 transition"
                                data-filter="{{ $category }}" onclick="filterPortfolio('{{ $category }}')">
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Projects Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-16">
                    @foreach ($portfolioProjects as $project)
                        <div class="portfolio-card group cursor-pointer bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300"
                            data-filter="{{ $project->category }}">
                            {{-- Project Image --}}
                            <div class="relative overflow-hidden rounded-t-2xl">
                                <img loading="lazy" src="{{ $project->image }}" alt="{{ $project->title }}"
                                    onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#f59c00] to-[#f59b0034] opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex items-center justify-center">
                                    <div
                                        class="flex flex-col text-center text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        <span class="inline-block mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m4 4h-1v-4h-1m4 4h-1v-4h-1m4 4h-1v-4h-1" />
                                            </svg>
                                        </span>
                                        <a href="{{ $project->external_url }}" target="_blank"
                                            alt="{{ $project->title }}" class="text-sm font-medium">
                                            {{ app()->getLocale() === 'en' ? 'View Details' : 'عرض التفاصيل' }}</a>
                                    </div>
                                </div>
                            </div>
                            {{-- Project Content --}}
                            <div class="p-6 space-y-4">
                                <div class="flex items-center justify-between">
                                    <span
                                        class="text-sm text-[#f59c00] font-medium bg-[#f59c00]/10 px-3 py-1 rounded-full">
                                        {{ $project->category }}
                                    </span>
                                    <div class="flex space-x-2">
                                        @if ($project->github_url)
                                            <a href="{{ $project->github_url }}" target="_blank"
                                                class="p-2 text-gray-400 hover:text-[#f59c00] transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56 0-.28-.01-1.02-.02-2-3.2.7-3.88-1.54-3.88-1.54-.53-1.34-1.3-1.7-1.3-1.7-1.06-.72.08-.71.08-.71 1.17.08 1.79 1.2 1.79 1.2 1.04 1.78 2.73 1.27 3.4.97.11-.75.41-1.27.74-1.56-2.55-.29-5.23-1.28-5.23-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 2.9-.39c.98.01 1.97.13 2.9.39 2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.81 1.19 1.84 1.19 3.1 0 4.43-2.69 5.41-5.25 5.7.42.36.79 1.09.79 2.2 0 1.59-.01 2.87-.01 3.26 0 .31.21.68.8.56C20.71 21.39 24 17.08 24 12c0-6.27-5.23-11.5-12-11.5z" />
                                                </svg>
                                            </a>
                                        @endif
                                        {{--  @if ($project->external_url)
                                            <a href="{{ $project->external_url }}" target="_blank" class="p-2 text-gray-400 hover:text-[#f59c00] transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3h7v7m0 0L10 21l-7-7 11-11z"/></svg>
                                            </a>
                                        @endif --}}
                                    </div>
                                </div>
                                <div>
                                    <h3
                                        class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#f59c00] transition-colors">
                                        {{ $project->title }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                        {{ $project->description }}
                                    </p>
                                </div>
                                {{-- Technologies --}}
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($project->tags as $tech)
                                        <span
                                            class="text-xs bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 px-3 py-1 rounded-full">
                                            {{ $tech->name }}
                                        </span>
                                    @endforeach
                                </div>
                                {{--   <div class="pt-4 border-t border-gray-200 dark:border-slate-700">
                                        <div
                                            class="text-[#f59c00] font-medium text-sm group-hover:underline flex items-center">
                                            {{ app()->getLocale() === 'en' ? 'View Case Study' : 'عرض دراسة الحالة' }}
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </div>
                                    </div> --}}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Stats Section --}}
                <div
                    class="bg-white dark:bg-slate-800 rounded-3xl p-8 md:p-12 mb-16 border border-gray-200 dark:border-slate-700">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ app()->getLocale() === 'en' ? 'Project Impact' : 'أثر المشاريع' }}</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ app()->getLocale() === 'en' ? 'Measurable results from our portfolio projects' : 'نتائج قابلة للقياس من مشاريعنا' }}
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#f59c00] mb-2">95%</div>
                            <div class="text-gray-600 dark:text-gray-300">
                                {{ app()->getLocale() === 'en' ? 'Client Retention Rate' : 'معدل الاحتفاظ بالعملاء' }}
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#f59c00] mb-2">2.5x</div>
                            <div class="text-gray-600 dark:text-gray-300">
                                {{ app()->getLocale() === 'en' ? 'Average ROI Increase' : 'متوسط زيادة العائد' }}
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#f59c00] mb-2">40%</div>
                            <div class="text-gray-600 dark:text-gray-300">
                                {{ app()->getLocale() === 'en' ? 'Traffic Growth' : 'نمو الزيارات' }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#f59c00] mb-2">24/7</div>
                            <div class="text-gray-600 dark:text-gray-300">
                                {{ app()->getLocale() === 'en' ? 'System Uptime' : 'تشغيل النظام' }}</div>
                        </div>
                    </div>
                </div>

                {{-- CTA Section --}}
                <div
                    class="text-center bg-gradient-to-r from-[#f59c00] to-[#f59c00] rounded-3xl p-8 md:p-12 text-white">
                    <h3 class="text-3xl md:text-4xl font-bold mb-4">
                        {{ app()->getLocale() === 'en' ? 'Ready to Start Your Success Story?' : 'هل أنت مستعد لبدء قصة نجاحك؟' }}
                    </h3>
                    <p class="text-lg text-red-100 mb-8 max-w-2xl mx-auto">
                        {{ app()->getLocale() === 'en'
                            ? "Join our portfolio of successful projects. Let's create something amazing together that drives real business results."
                            : 'انضم إلى مجموعة مشاريعنا الناجحة. دعنا نبتكر شيئًا مذهلاً معًا يحقق نتائج حقيقية.' }}
                    </p>
                    <a href="{{ route('contact.index', app()->getLocale()) }}"
                        class="bg-white text-[#f59c00] hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-medium transition-all duration-200 hover:shadow-xl hover:-translate-y-1 group inline-flex items-center justify-center">
                        {{ app()->getLocale() === 'en' ? 'Start Your Project' : 'ابدأ مشروعك' }}
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- End Portfolio Section --}}

    {{-- section for works --}}

    {{-- Clients Section --}}
    <section id="partener" class="w-full py-20 bg-gradient-to-br from-gray-50 to-white ">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                {{-- Section Header --}}
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#f59c00]/10 text-[#f59c00] text-sm font-medium mb-6">
                        <span class="w-2 h-2 bg-[#f59c00] rounded-full animate-pulse"></span>
                        {{ app()->getLocale() === 'en' ? 'Our Partners' : 'شركاؤنا' }}
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-[#f59c00] mb-6">
                        {{ app()->getLocale() === 'en' ? 'Trusted by the best' : 'موثوق به من قبل الأفضل' }}

                        <span
                            class="text-gradient">{{ app()->getLocale() === 'en' ? 'in the Industry' : 'في الصناعة' }}</span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        {{ app()->getLocale() === 'en'
                            ? "Explore our diverse portfolio of successful projects across industries. From startups to enterprise solutions, see how we've helped clients achieve their goals."
                            : 'استكشف مجموعة متنوعة من مشاريعنا الناجحة في مختلف الصناعات. من الشركات الناشئة إلى الحلول المؤسسية، شاهد كيف ساعدنا عملاءنا على تحقيق أهدافهم.' }}
                    </p>
                </div>
                {{-- End Section Header --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-0">
                    @foreach ($clientImages as $partner)
                        <div class="flex items-center justify-center">
                            <img loading="lazy" src="{{ asset('storage/' . $partner->image) }}"
                                onerror="this.onerror=null; this.src='{{ asset('storage/logo.png') }}'"
                                alt="{{ $partner->name }}" class="h-auto min-h-[16rem]">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- Clients Section --}}
    {{-- Reviews Section --}}

    <section id="reviews" class="py-20 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-[#f59c00]">
                    {{ $isRtl ? 'ماذا يقول عملاؤنا' : 'What Our' }}
                    <span class="bg-gradient-to-r from-[#f59c00] to-[#f59b0056] bg-clip-text text-transparent">
                        {{ $isRtl ? 'العملاء' : 'Clients' }}
                    </span>
                    {{ $isRtl ? 'عنا' : 'Say' }}
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto leading-relaxed text-center">
                    {{ $isRtl
                        ? 'موثوق به من قبل الشركات في مجالات التقنية والموضة والشركات الناشئة لتحقيق نتائج استثنائية ودفع نمو الأعمال.'
                        : 'Trusted by companies across tech, fashion, and startup sectors to deliver exceptional results and drive business growth.' }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                @foreach ($latestReviews as $review)
                    <div
                        class="relative p-8 rounded-2xl bg-[#f59b0034] hover:shadow-xl transition-all duration-300 hover:scale-105 {{ $isRtl ? 'text-right' : 'text-left' }}">
                        <div class="absolute top-4 {{ $isRtl ? 'right-4' : 'left-4' }} text-[#f59c00] opacity-20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M17 8h2a2 2 0 0 1 2 2v3a4 4 0 0 1-4 4h-1m-8-7h2a2 2 0 0 1 2 2v3a4 4 0 0 1-4 4H7" />
                            </svg>
                        </div>
                        <div class="flex justify-evenly items-center mb-6 {{ $isRtl ? 'flex-row-reverse' : '' }}">
                            <img loading="lazy" src="{{ $review->image ?? asset('storage/logo.png') }}"
                                onerror="this.onerror=null; this.src='{{ asset('storage/profile.png') }}'"
                                alt="{{ $review->name }}"
                                class="w-16 h-16 rounded-full object-cover {{ $isRtl ? 'mr-4' : 'ml-4' }}">
                            <div class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                                <h4 class="text-lg font-semibold text-[#f59c00]">{{ $review->name }}</h4>
                            </div>
                        </div>

                        <p class="text-gray-600 leading-relaxed italic {{ $isRtl ? 'text-right' : 'text-left' }}">
                            "{{ $review->review }}"
                        </p>
                        <div class="flex my-4 text-yellow-400 justify-center">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < ($review->rating ?? 5))
                                    &#9733;
                                @else
                                    <span class="text-gray-300">&#9733;</span>
                                @endif
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($latestReviews->isNotEmpty())
                @php
                    $averageRating = round($latestReviews->avg('rating'), 1);
                    $reviewsCount = $latestReviews->count();
                @endphp
                <div class="mt-12 text-center">
                    <div
                        class="inline-flex items-center px-6 py-3 rounded-full bg-[#f59b0034] border border-gray-200 {{ $isRtl ? 'flex-row-reverse' : '' }}">
                        <div class="flex {{ $isRtl ? 'mr-3' : 'ml-3' }} text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($averageRating))
                                    &#9733;
                                @elseif ($i - $averageRating < 1)
                                    <span class="text-yellow-300">&#9733;</span>
                                @else
                                    <span class="text-gray-300">&#9733;</span>
                                @endif
                            @endfor
                        </div>
                        <span class="font-semibold text-gray-900 {{ $isRtl ? 'mr-2' : 'ml-2' }}">
                            {{ $isRtl ? "متوسط التقييم {$averageRating}/5 " : "{$averageRating}/5 Average Rating " }}
                        </span>
                        <span class="text-sm text-gray-600 {{ $isRtl ? 'mr-2' : 'ml-2' }}">
                            {{ $isRtl ? "({$reviewsCount} مراجعة)" : "({$reviewsCount} Reviews)" }}
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </section>


    {{-- Clients Section --}}

    {{-- blogs --}}

    <section id="blogs" class="py-20 w-full relative overflow-hidden text-[#f59c00]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    {{ app()->getLocale() === 'en' ? 'Latest Blogs' : 'أحدث المدونات' }}
                </h2>
                <p class="text-xl max-w-2xl mx-auto leading-relaxed text-gray-300">
                    {{ app()->getLocale() === 'en' ? 'Check out our latest blog posts and updates.' : 'اطلع على أحدث منشورات المدونة والتحديثات.' }}
                </p>
                {{-- create a to all blogs --}}
                <div class="m-6">
                    <a href="{{ route('blogs.index', app()->getLocale()) }}"
                        class="bg-[#f59c00] hover:bg-[#f59b0034] text-white px-8 py-3 rounded-full text-lg font-medium transition-all duration-200 hover:shadow-xl hover:-translate-y-1 group inline-flex  justify-center place-content-center place-items-center gap-2">
                        {{ app()->getLocale() === 'en' ? 'View All Blogs' : 'عرض جميع المدونات' }}
                        @if ($isRtl)
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        @endif
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($latestPosts as $post)
                        <div
                            class="bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer relative min-h-[20rem] ">
                            @if ($post->tags->isNotEmpty())
                                <div class="flex absolute z-50 top-2 gap-2 px-3">
                                    @foreach ($post->tags as $tag)
                                        <span
                                            class="bg-[#f59c00] hover:bg-[#f59b0034] text-white px-2 py-2 rounded-full text-[.5rem] font-medium transition-all duration-200 hover:shadow-xl hover:-translate-y-1 group">
                                            {{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <span
                                    class="bg-[#f59c00] text-white hover:bg-[#f59b007c] text-xs px-2 py-1 rounded-full inline-block whitespace-nowrap absolute z-50 top-2">
                                    {{ app()->getLocale() === 'en' ? 'general' : 'عام' }}
                                </span>
                            @endif
                            <a class="w-full h-full"
                                href="{{ route('blogs.show', ['lang' => app()->getLocale(), 'blog' => $post->slug]) }}">
                                @if ($post->image)
                                    <img loading="lazy"
                                        src="{{ $post->image ? $post->image : asset('storage/' . $post->image) }}"
                                        onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                                        alt="{{ $post->title }}"
                                        class="w-full h-full object-cover hover:blur-sm" />
                                @endif
                                <div class="p-6 absolute bottom-0">
                                    <h3 class="text-2xl font-bold mb-2">{{ Str::limit($post->title, 50) }}</h3>
                                    <p class="text-gray-300 mb-4">
                                        {{ Str::limit($post->short_description) }}</p>
                                    <a href="{{ route('blogs.show', ['lang' => app()->getLocale(), 'blog' => $post->slug]) }}"
                                        class="bg-[#f59c00] hover:bg-[#f59b0034] text-white px-8 py-3 rounded-full text-lg font-medium transition-all duration-200 hover:shadow-xl hover:-translate-y-1 group">{{ app()->getLocale() === 'en' ? 'Read More' : 'اعرف المزيد' }}</a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
    {{-- blogs --}}


    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif


    <script>
        function filterPortfolio(category) {
            document.querySelectorAll('.portfolio-card').forEach(function(card) {
                if (category === '' || card.getAttribute('data-filter') === category) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</x-master-layout>
