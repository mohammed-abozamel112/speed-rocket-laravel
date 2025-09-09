<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
    @endphp

    <section class="w-full min-h-screen relative py-32 overflow-hidden">


        <!-- Floating particles -->
        <div class="absolute inset-0 overflow-hidden opacity-20">
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-[#A31621] rounded-full animate-float"></div>
            <div class="absolute top-1/3 right-1/5 w-3 h-3 bg-[#A31621] rounded-full animate-float-2"></div>
            <div class="absolute bottom-1/4 left-1/5 w-1 h-1 bg-[#A31621] rounded-full animate-float-3"></div>
            <div class="absolute bottom-1/3 right-1/4 w-2 h-2 bg-[#A31621] rounded-full animate-float-4"></div>
        </div>

        <div
            class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center transition-all duration-1000 opacity-100 translate-y-0">
            <!-- Badge with pulse animation -->
            <div
                class="inline-flex items-center rounded-full border border-[#A31621] bg-[#fcf7f9] px-6 py-3 text-sm font-medium text-[#A31621] mb-8">
                {{ $isRtl ? '🚀 نقود الابتكار منذ 2020' : '🚀 Powering Innovation Since 2020' }}
            </div>

            <!-- Headline with glow effect -->
            <h1 class="text-5xl sm:text-7xl font-extrabold text-[#A31621] mb-8 leading-tight">
                {{ $isRtl ? 'نبني' : 'Building the' }}
                <span
                    class="bg-gradient-to-r from-[#A31621] to-[#fcf7f9] bg-clip-text text-transparent animate-text-glow">
                    {{ $isRtl ? 'المستقبل' : 'Future' }}
                </span>
                <br>{{ $isRtl ? 'بسرعة الضوء' : 'at Light Speed' }}
            </h1>

            <p class="text-2xl text-gray-300 max-w-4xl mx-auto leading-relaxed mb-12">
                {{ $isRtl
                    ? 'نحن الوقود الصاروخي للشركات الطموحة الجاهزة لتحويل صناعتها. من شركات وادي السيليكون إلى مؤسسات فور تشون، نسرّع نجاحكم.'
                    : "We're the rocket fuel for ambitious companies ready to transform their industry. From Silicon Valley startups to Fortune 500 enterprises, we accelerate success." }}
            </p>

            <!-- Stats grid with staggered animation -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 max-w-4xl mx-auto">
                <div class="text-center group animate-fade-in-up" style="animation-delay: 100ms">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-[#A31621] to-[#A31621] rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-[#A31621] hover:shadow-[#A31621]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-8 w-8 text-white">
                            <path
                                d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.97-2.07 1.67-2.92C11.26 10.3 15.5 10 15.5 10l-1.67-1.67c-.85-.7-2.08-.96-2.92-1.67-1.26-1.5-2-5-2-5s3.74-.5 5-2c.84.71 2.07.97 2.92 1.67C13.7 8.74 14 13 14 13l1.67 1.67c.7-.85.96-2.08 1.67-2.92 1.5-1.26 5-2 5-2s-.5 3.74-2 5c-.71.84-.97 2.07-1.67 2.92C10.3 11.26 10 15.5 10 15.5l-1.67 1.67c-.85.7-2.08.96-2.92 1.67Z">
                            </path>
                            <path d="M19 14V6l-2.5-2.5L12 2"></path>
                            <path d="M15 11l-2.5-2.5L10 6"></path>
                            <path d="M19 14l-2.5-2.5L10 6"></path>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-[#A31621] mb-2 group-hover:text-[#A31621] transition-colors">500+
                    </div>
                    <div class="text-gray-400 text-sm font-medium group-hover:text-gray-300 transition-colors">
                        {{ $isRtl ? 'المشاريع المنطلقة' : 'Projects Launched' }}</div>
                </div>

                <div class="text-center group animate-fade-in-up" style="animation-delay: 200ms">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-[#A31621] to-red-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-[#A31621] hover:shadow-[#A31621]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-8 w-8 text-white">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-[#A31621] mb-2 group-hover:text-[#A31621] transition-colors">98%
                    </div>
                    <div class="text-gray-400 text-sm font-medium group-hover:text-gray-300 transition-colors">
                        {{ $isRtl ? 'معدل نجاح العملاء' : 'Client Success Rate' }}</div>
                </div>

                <div class="text-center group animate-fade-in-up" style="animation-delay: 300ms">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-[#A31621] to-red-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-[#A31621]/25 hover:shadow-[#A31621]/40">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-8 w-8 text-white">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                            <polyline points="16 7 22 7 22 13"></polyline>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-[#A31621] mb-2 group-hover:text-[#A31621] transition-colors">3x
                    </div>
                    <div class="text-gray-400 text-sm font-medium group-hover:text-gray-300 transition-colors">
                        {{ $isRtl ? 'تسليم أسرع' : 'Faster Delivery' }}</div>
                </div>

                <div class="text-center group animate-fade-in-up" style="animation-delay: 400ms">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-[#A31621] to-red-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-[#A31621]/25 hover:shadow-[#A31621]/40">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-8 w-8 text-white">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-[#A31621] mb-2 group-hover:text-[#A31621] transition-colors">24/7
                    </div>
                    <div class="text-gray-400 text-sm font-medium group-hover:text-gray-300 transition-colors">
                        {{ $isRtl ? 'دعم خبير' : 'Expert Support' }}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full py-32 bg-gray-850 relative overflow-hidden">

        <div class="absolute bottom-0 right-0 w-64 h-64 bg-red-500 rounded-full filter blur-3xl opacity-10 animate-pulse-slow"
            style="animation-delay: 2s"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 animate-fade-in">
                <h2 class="text-4xl sm:text-5xl font-bold text-[#A31621] mb-6">
                    {{ $isRtl ? 'الحمض النووي' : 'Our ' }} <span
                        class="bg-gradient-to-r from-[#A31621] to-[#c9c5c5] bg-clip-text text-transparent animate-text-glow">{{ $isRtl ? '' : 'DNA' }}</span>
                    {{ $isRtl ? '' : '' }}
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    {{ $isRtl ? 'المعتقدات والرؤية الأساسية التي تقود كل ما نقوم به' : 'The core beliefs and vision that drive everything we do' }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div
                    class="rounded-lg border border-[#A31621] bg-gradient-to-br from-[#A31621] to-[#fcf7f9] p-6 shadow-sm transition-all duration-500 group relative overflow-hidden hover:border-[#A31621] hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-[#A31621]/5 to-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div
                        class="absolute -inset-1 rounded-lg bg-gradient-to-r from-[#A31621] to-red-500 opacity-0 group-hover:opacity-20 blur-md transition-opacity duration-500">
                    </div>
                    <div class="relative z-10 pb-8">
                        <div
                            class="w-20 h-20 bg-gradient-to-r from-[#A31621] to-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-[#A31621]/25">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="h-10 w-10 text-white">
                                <path
                                    d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.97-2.07 1.67-2.92C11.26 10.3 15.5 10 15.5 10l-1.67-1.67c-.85-.7-2.08-.96-2.92-1.67-1.26-1.5-2-5-2-5s3.74-.5 5-2c.84.71 2.07.97 2.92 1.67C13.7 8.74 14 13 14 13l1.67 1.67c.7-.85.96-2.08 1.67-2.92 1.5-1.26 5-2 5-2s-.5 3.74-2 5c-.71.84-.97 2.07-1.67 2.92C10.3 11.26 10 15.5 10 15.5l-1.67 1.67c-.85.7-2.08.96-2.92 1.67Z">
                                </path>
                                <path d="M19 14V6l-2.5-2.5L12 2"></path>
                                <path d="M15 11l-2.5-2.5L10 6"></path>
                                <path d="M19 14l-2.5-2.5L10 6"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-[#A31621] transition-colors">
                            {{ $isRtl ? 'مهمتنا' : 'Our Mission' }}</h3>
                    </div>
                    <div class="relative z-10">
                        <p
                            class="text-gray-300 text-lg leading-relaxed mb-8 group-hover:text-gray-200 transition-colors">
                            {{ $isRtl
                                ? 'أن نجعل التكنولوجيا المتقدمة متاحة عبر حلول بمستوى مؤسسي للشركات بجميع الأحجام. نؤمن أن الابتكار لا ينبغي أن يقيده الزمن أو الميزانيات التقليدية.'
                                : 'To democratize cutting-edge technology by making enterprise-grade solutions accessible to businesses of all sizes. We believe innovation shouldn\'t be limited by traditional development timelines or budget constraints.' }}
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3 group-hover:translate-x-1 transition-transform">
                                <div class="w-2 h-2 bg-[#A31621] rounded-full animate-pulse"></div>
                                <span
                                    class="text-gray-400 font-medium group-hover:text-gray-300 transition-colors">{{ $isRtl ? 'تطوير MVP سريع' : 'Rapid MVP Development' }}</span>
                            </div>
                            <div class="flex items-center space-x-3 group-hover:translate-x-1 transition-transform"
                                style="transition-delay: 50ms">
                                <div class="w-2 h-2 bg-[#A31621] rounded-full animate-pulse"
                                    style="animation-delay: 150ms"></div>
                                <span
                                    class="text-gray-400 font-medium group-hover:text-gray-300 transition-colors">{{ $isRtl ? 'جودة بمستوى مؤسسي' : 'Enterprise-Grade Quality' }}</span>
                            </div>
                            <div class="flex items-center space-x-3 group-hover:translate-x-1 transition-transform"
                                style="transition-delay: 100ms">
                                <div class="w-2 h-2 bg-[#A31621] rounded-full animate-pulse"
                                    style="animation-delay: 300ms"></div>
                                <span
                                    class="text-gray-400 font-medium group-hover:text-gray-300 transition-colors">{{ $isRtl ? 'ابتكار متاح' : 'Accessible Innovation' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="rounded-lg border border-[#A31621] bg-gradient-to-br from-[#A31621] to-[#fcf7f9] p-6 shadow-sm transition-all duration-500 group relative overflow-hidden hover:border-[#A31621] hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-red-500/5 to-[#A31621]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div
                        class="absolute -inset-1 rounded-lg bg-gradient-to-r from-red-500 to-[#A31621] opacity-0 group-hover:opacity-20 blur-md transition-opacity duration-500">
                    </div>
                    <div class="relative z-10 pb-8">
                        <div
                            class="w-20 h-20 bg-gradient-to-r from-red-500 to-[#A31621] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-red-500/25">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="h-10 w-10 text-white">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="6"></circle>
                                <circle cx="12" cy="12" r="2"></circle>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-red-400 transition-colors">
                            {{ $isRtl ? 'رؤيتنا' : 'Our Vision' }}</h3>
                    </div>
                    <div class="relative z-10">
                        <p
                            class="text-gray-300 text-lg leading-relaxed mb-8 group-hover:text-gray-200 transition-colors">
                            {{ $isRtl
                                ? 'أن نكون المحرك العالمي للتحول الرقمي، وتمكين الشركات من إطلاق منتجات رائدة خلال أسابيع لا أشهر.'
                                : 'To become the global catalyst for digital transformation, enabling companies worldwide to launch groundbreaking products in weeks, not months.' }}
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3 group-hover:translate-x-1 transition-transform">
                                <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                                <span
                                    class="text-gray-400 font-medium group-hover:text-gray-300 transition-colors">{{ $isRtl ? 'تأثير عالمي' : 'Global Impact' }}</span>
                            </div>
                            <div class="flex items-center space-x-3 group-hover:translate-x-1 transition-transform"
                                style="transition-delay: 50ms">
                                <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"
                                    style="animation-delay: 150ms"></div>
                                <span
                                    class="text-gray-400 font-medium group-hover:text-gray-300 transition-colors">{{ $isRtl ? 'ريادة في الصناعة' : 'Industry Leadership' }}</span>
                            </div>
                            <div class="flex items-center space-x-3 group-hover:translate-x-1 transition-transform"
                                style="transition-delay: 100ms">
                                <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"
                                    style="animation-delay: 300ms"></div>
                                <span
                                    class="text-gray-400 font-medium group-hover:text-gray-300 transition-colors">{{ $isRtl ? 'سرعة ثورية' : 'Revolutionary Speed' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative overflow-hidden">
        <!-- Floating gradient circles -->
        <div
            class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-r from-[#A31621] to-red-500/10 rounded-full filter blur-3xl opacity-20 animate-float">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-96 h-96 bg-gradient-to-r from-red-500/10 to-[#A31621] rounded-full filter blur-3xl opacity-20 animate-float-2">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 animate-fade-in">
                <h2 class="text-4xl sm:text-5xl font-bold text-[#A31621] mb-6">
                    {{ $isRtl ? 'ما الذي يدفعنا' : 'What Drives' }} <span
                        class="bg-gradient-to-r from-[#A31621] to-red-500 bg-clip-text text-transparent animate-text-glow">{{ $isRtl ? 'نا' : 'Us' }}</span>
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    {{ $isRtl ? 'المبادئ الأساسية التي تشكل ثقافتنا وتوجه كل قرار' : 'The fundamental principles that shape our culture and guide every decision' }}
                </p>
            </div>

            <!-- Cards with staggered animation -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="group text-center animate-fade-in-up" style="animation-delay: 100ms">
                    <div class="relative mb-8">
                        <div
                            class="w-32 h-32 mx-auto bg-gradient-to-br from-[#A31621] to-[#fcf7f9] rounded-3xl flex items-center justify-center group-hover:scale-110 transition-all duration-500 shadow-2xl border border-[#A31621] group-hover:border-[#A31621]">
                            <div
                                class="w-20 h-20 bg-gradient-to-r from-[#A31621] to-red-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-500 shadow-lg shadow-[#A31621]/25">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-10 w-10 text-[#A31621]">
                                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                </svg>
                            </div>
                        </div>
                        <!-- Subtle glow effect -->
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-r from-[#A31621] to-red-500 opacity-0 group-hover:opacity-10 blur-md transition-opacity duration-500 -z-10">
                        </div>
                    </div>
                    <h3
                        class="text-2xl font-bold text-[#A31621] mb-6 group-hover:text-[#A31621] transition-colors duration-300">
                        {{ $isRtl ? 'سريع كالبرق' : 'Lightning Fast' }}
                    </h3>
                    <p
                        class="text-gray-400 text-lg leading-relaxed group-hover:text-gray-300 transition-colors duration-300">
                        {{ $isRtl ? 'نقدم نتائج بسرعة غير مسبوقة دون التضحية بالجودة أو الاهتمام بالتفاصيل' : 'We deliver results at unprecedented speed without sacrificing quality or attention to detail' }}
                    </p>
                </div>

                <div class="group text-center animate-fade-in-up" style="animation-delay: 200ms">
                    <div class="relative mb-8">
                        <div
                            class="w-32 h-32 mx-auto bg-gradient-to-br from-[#A31621] to-[#fcf7f9] rounded-3xl flex items-center justify-center group-hover:scale-110 transition-all duration-500 shadow-2xl border border-[#A31621] group-hover:border-[#A31621]">
                            <div
                                class="w-20 h-20 bg-gradient-to-r from-[#A31621] to-red-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-500 shadow-lg shadow-[#A31621]/25">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-10 w-10 text-[#A31621]">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <circle cx="12" cy="12" r="6"></circle>
                                    <circle cx="12" cy="12" r="2"></circle>
                                </svg>
                            </div>
                        </div>
                        <!-- Subtle glow effect -->
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-r from-[#A31621] to-red-500 opacity-0 group-hover:opacity-10 blur-md transition-opacity duration-500 -z-10">
                        </div>
                    </div>
                    <h3
                        class="text-2xl font-bold text-[#A31621] mb-6 group-hover:text-[#A31621] transition-colors duration-300">
                        {{ $isRtl ? 'تركيز دقيق' : 'Laser Focused' }}
                    </h3>
                    <p
                        class="text-gray-400 text-lg leading-relaxed group-hover:text-gray-300 transition-colors duration-300">
                        {{ $isRtl ? 'كل حل مصمم بدقة لتحقيق أهداف عملك المحددة' : 'Every solution is precisely engineered to achieve your specific business goals and objectives' }}
                    </p>
                </div>

                <div class="group text-center animate-fade-in-up" style="animation-delay: 300ms">
                    <div class="relative mb-8">
                        <div
                            class="w-32 h-32 mx-auto bg-gradient-to-br from-[#A31621] to-[#fcf7f9] rounded-3xl flex items-center justify-center group-hover:scale-110 transition-all duration-500 shadow-2xl border border-[#A31621] group-hover:border-[#A31621]">
                            <div
                                class="w-20 h-20 bg-gradient-to-r from-[#A31621] to-red-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-500 shadow-lg shadow-[#A31621]/25">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-10 w-10 text-[#A31621]">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                            </div>
                        </div>
                        <!-- Subtle glow effect -->
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-r from-[#A31621] to-red-500 opacity-0 group-hover:opacity-10 blur-md transition-opacity duration-500 -z-10">
                        </div>
                    </div>
                    <h3
                        class="text-2xl font-bold text-[#A31621] mb-6 group-hover:text-[#A31621] transition-colors duration-300">
                        {{ $isRtl ? 'صلب كالصخرة' : 'Rock Solid' }}
                    </h3>
                    <p
                        class="text-gray-400 text-lg leading-relaxed group-hover:text-gray-300 transition-colors duration-300">
                        {{ $isRtl ? 'مصمم بأمان وموثوقية تناسب نمو أعمالك' : 'Built with enterprise-grade security and reliability that scales with your growing business' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-gradient-to-br from-gray-850 to-gray-900 relative overflow-hidden">
        <!-- Animated gradient background -->

        <!-- Floating particles -->
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-1/4 left-1/4 w-1 h-1 bg-[#A31621] rounded-full animate-float"></div>
            <div class="absolute top-1/3 right-1/5 w-2 h-2 bg-red-500 rounded-full animate-float-2"></div>
            <div class="absolute bottom-1/4 left-1/5 w-1 h-1 bg-[#A31621] rounded-full animate-float-3"></div>
            <div class="absolute bottom-1/3 right-1/4 w-1 h-1 bg-[#A31621] rounded-full animate-float-4"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 animate-fade-in">
                <h2 class="text-4xl sm:text-5xl font-bold text-[#A31621] mb-6">
                    {{ $isRtl ? 'تعرف على الروّاد' : 'Meet the' }} <span
                        class="bg-gradient-to-r from-[#A31621] to-red-500 bg-clip-text text-transparent animate-text-glow">{{ $isRtl ? '' : 'Visionaries' }}</span>
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    {{ $isRtl ? 'العقول المبدعة والقوى التي تقود نهجنا الثوري' : "The brilliant minds and creative forces behind Speed Rocket's revolutionary approach" }}
                </p>
            </div>

            <!-- Team cards with staggered animation -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="rounded-lg border border-[#A31621] bg-gradient-to-br from-[#A31621] to-[#fcf7f9] p-6 shadow-sm transition-all duration-500 group relative overflow-hidden hover:border-[#A31621] hover:scale-105 animate-fade-in-up"
                    style="animation-delay: 100ms">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-[#A31621]/5 to-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div
                        class="absolute -inset-1 rounded-lg bg-gradient-to-r from-[#A31621] to-red-500 opacity-0 group-hover:opacity-20 blur-md transition-opacity duration-500">
                    </div>
                    <div class="relative z-10 text-center pt-12">
                        <div class="relative mb-8">
                            <div
                                class="w-32 h-32 mx-auto rounded-full border-4 border-[#A31621] group-hover:border-[#A31621] transition-all duration-500 shadow-2xl overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1549068106-b024baf5062d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                                    alt="{{ $isRtl ? 'جون دو' : 'John Doe' }}"
                                    class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div
                                class="absolute inset-x-0 inset-y-8 bg-gradient-to-r from-[#A31621] to-red-500 rounded-full opacity-0 group-hover:opacity-30 transition-opacity duration-500 blur-xl">
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold text-[#A31621] mb-3 group-hover:text-[#A31621] transition-colors duration-300">
                            {{ $isRtl ? 'جون دو' : 'John Doe' }}
                        </h3>
                        <div
                            class="inline-flex items-center rounded-full border border-[#A31621] bg-gradient-to-r from-[#A31621]/20 to-red-500/20 px-4 py-2 text-sm font-medium text-[#A31621] group-hover:bg-gradient-to-r group-hover:from-[#A31621]/30 group-hover:to-red-500/30 transition-all duration-300">
                            {{ $isRtl ? 'المؤسس والرئيس التنفيذي' : 'Founder & CEO' }}
                        </div>
                    </div>
                    <div class="relative z-10 text-center pb-12">
                        <p
                            class="text-gray-300 text-lg leading-relaxed group-hover:text-gray-300 transition-colors duration-300">
                            {{ $isRtl ? 'رائد أعمال متسلسل شغوف بالتكنولوجيا المدمرة ولديه رؤية لجعل الابتكار متاحًا للجميع.' : 'A serial entrepreneur with a passion for disruptive technology and a vision to make innovation accessible to all.' }}
                        </p>
                    </div>
                </div>

                <div class="rounded-lg border border-[#A31621] bg-gradient-to-br from-[#A31621] to-[#fcf7f9] p-6 shadow-sm transition-all duration-500 group relative overflow-hidden hover:border-[#A31621] hover:scale-105 animate-fade-in-up"
                    style="animation-delay: 200ms">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-[#A31621]/5 to-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div
                        class="absolute -inset-1 rounded-lg bg-gradient-to-r from-[#A31621] to-red-500 opacity-0 group-hover:opacity-20 blur-md transition-opacity duration-500">
                    </div>
                    <div class="relative z-10 text-center pt-12">
                        <div class="relative mb-8">
                            <div
                                class="w-32 h-32 mx-auto rounded-full border-4 border-[#A31621] group-hover:border-[#A31621] transition-all duration-500 shadow-2xl overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=761&q=80"
                                    alt="{{ $isRtl ? 'جين سميث' : 'Jane Smith' }}"
                                    class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div
                                class="absolute inset-x-0 inset-y-8 bg-gradient-to-r from-[#A31621] to-red-500 rounded-full opacity-0 group-hover:opacity-30 transition-opacity duration-500 blur-xl">
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold text-[#A31621] mb-3 group-hover:text-[#A31621] transition-colors duration-300">
                            {{ $isRtl ? 'جين سميث' : 'Jane Smith' }}
                        </h3>
                        <div
                            class="inline-flex items-center rounded-full border border-[#A31621] bg-gradient-to-r from-[#A31621]/20 to-red-500/20 px-4 py-2 text-sm font-medium text-[#A31621] group-hover:bg-gradient-to-r group-hover:from-[#A31621]/30 group-hover:to-red-500/30 transition-all duration-300">
                            {{ $isRtl ? 'رئيسة المنتج' : 'Head of Product' }}
                        </div>
                    </div>
                    <div class="relative z-10 text-center pb-12">
                        <p
                            class="text-gray-300 text-lg leading-relaxed group-hover:text-gray-300 transition-colors duration-300">
                            {{ $isRtl ? 'خبيرة تجربة المستخدم واستراتيجية المنتج، تضمن حلولنا أن تكون سريعة وممتعة للاستخدام.' : 'An expert in user experience and product strategy, Jane ensures our solutions are not just fast, but also delightful to use.' }}
                        </p>
                    </div>
                </div>

                <div class="rounded-lg border border-[#A31621] bg-gradient-to-br from-[#A31621] to-[#fcf7f9] p-6 shadow-sm transition-all duration-500 group relative overflow-hidden hover:border-[#A31621] hover:scale-105 animate-fade-in-up"
                    style="animation-delay: 300ms">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-[#A31621]/5 to-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div
                        class="absolute -inset-1 rounded-lg bg-gradient-to-r from-[#A31621] to-red-500 opacity-0 group-hover:opacity-20 blur-md transition-opacity duration-500">
                    </div>
                    <div class="relative z-10 text-center pt-12">
                        <div class="relative mb-8">
                            <div
                                class="w-32 h-32 mx-auto rounded-full border-4 border-[#A31621] group-hover:border-[#A31621] transition-all duration-500 shadow-2xl overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1579783483458-323a63162788?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=728&q=80"
                                    alt="{{ $isRtl ? 'مايكل تشن' : 'Michael Chen' }}"
                                    class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div
                                class="absolute inset-x-0 inset-y-8 bg-gradient-to-r from-[#A31621] to-red-500 rounded-full opacity-0 group-hover:opacity-30 transition-opacity duration-500 blur-xl">
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold text-[#A31621] mb-3 group-hover:text-[#A31621] transition-colors duration-300">
                            {{ $isRtl ? 'مايكل تشن' : 'Michael Chen' }}
                        </h3>
                        <div
                            class="inline-flex items-center rounded-full border border-[#A31621] bg-gradient-to-r from-[#A31621]/20 to-red-500/20 px-4 py-2 text-sm font-medium text-[#A31621] group-hover:bg-gradient-to-r group-hover:from-[#A31621]/30 group-hover:to-red-500/30 transition-all duration-300">
                            {{ $isRtl ? 'المهندس الرئيسي' : 'Lead Engineer' }}
                        </div>
                    </div>
                    <div class="relative z-10 text-center pb-12">
                        <p
                            class="text-gray-300 text-lg leading-relaxed group-hover:text-gray-300 transition-colors duration-300">
                            {{ $isRtl ? 'العبقري المعماري وراء بنية التقنية لدينا، يبني أنظمة قابلة للتوسع وآمنة.' : 'The architectural genius behind our technology stack, Michael builds scalable and secure systems that power our solutions.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom animations -->
    <style>
        @keyframes gradient-x {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes gradient-y {
            0% {
                background-position: 50% 0%;
            }

            50% {
                background-position: 50% 100%;
            }

            100% {
                background-position: 50% 0%;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-20px) translateX(10px);
            }
        }

        @keyframes float-2 {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(20px) translateX(-10px);
            }
        }

        @keyframes float-3 {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-15px) translateX(-15px);
            }
        }

        @keyframes float-4 {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(15px) translateX(15px);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.1;
            }

            50% {
                opacity: 0.2;
            }
        }

        @keyframes text-glow {

            0%,
            100% {
                text-shadow: 0 0 10px rgba(251, 146, 60, 0.5);
            }

            50% {
                text-shadow: 0 0 20px rgba(251, 146, 60, 0.8);
            }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes grid-move {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 60px 60px;
            }
        }

        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 15s ease infinite;
        }

        .animate-gradient-y {
            background-size: 200% 200%;
            animation: gradient-y 15s ease infinite;
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-2 {
            animation: float-2 10s ease-in-out infinite;
        }

        .animate-float-3 {
            animation: float-3 12s ease-in-out infinite;
        }

        .animate-float-4 {
            animation: float-4 9s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 6s ease-in-out infinite;
        }

        .animate-text-glow {
            animation: text-glow 3s ease-in-out infinite;
        }

        .animate-fade-in {
            animation: fade-in 1s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }

        .animate-grid-move {
            animation: grid-move 4s linear infinite;
        }
    </style>
</x-master-layout>
