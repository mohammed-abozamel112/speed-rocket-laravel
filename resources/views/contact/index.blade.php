<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
        $dir = $isRtl ? 'rtl' : 'ltr';
        $textAlign = $isRtl ? 'text-right' : 'text-left';
        $textAlignCenter = 'text-center';
        $flexReverse = $isRtl ? 'flex-row' : 'flex-row';
        $spaceReverse = $isRtl ? 'space-x-reverse' : 'space-x-2';
        $borderLeft = $isRtl ? 'border-r-4' : 'border-l-4';
        $marginLeft = $isRtl ? 'mr-2' : 'ml-2';
        $marginRight = $isRtl ? 'ml-2' : 'mr-2';
    @endphp

    <div class="min-h-screen {{ $dir }}" style="background-color: #fcf7f9;">
        <!-- Hero Section -->
        <section class="relative py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto {{ $textAlignCenter }}">
                <div class="mb-8">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 tracking-tight">
                        <span style="color: #f59c00;">{{ $isRtl ? 'تواصل معنا' : 'Get in Touch' }}</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        {{ $isRtl
                            ? 'مستعد لتحويل عملك؟ نحن نحب أن نسمع منك. دعنا نناقش كيف يمكننا مساعدتك في تحقيق رؤيتك.'
                            : 'Ready to transform your business? We\'d love to hear from you. Let\'s discuss how we can help bring your vision to life.' }}
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button
                        class="px-8 py-6 text-lg font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center"
                        style="background-color: #f59c00; color: #fcf7f9;"
                        onclick="document.getElementById('contact-form').scrollIntoView({ behavior: 'smooth' })">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-5 w-5 {{ $marginRight }}">
                            <path d="m22 2-7 20-4-9-9-4Z" />
                            <path d="M22 2 11 13" />
                        </svg>
                        {{ $isRtl ? 'ابدأ محادثة' : 'Start a Conversation' }}
                    </button>
                    <button
                        class="px-8 py-6 text-lg font-semibold border-2 transition-all duration-300 hover:scale-105 flex items-center"
                        style="border-color: #f59c00; color: #f59c00;"
                        onclick="document.getElementById('offices').scrollIntoView({ behavior: 'smooth' })">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-5 w-5 {{ $marginRight }}">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        {{ $isRtl ? 'زور مكاتبنا' : 'Visit Our Offices' }}
                    </button>
                </div>
            </div>
        </section>

        <!-- Contact Form & Info Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8" style="background-color: #ffffff;">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-16">
                    <!-- Contact Form -->
                    <div id="contact-form">
                        <div class="shadow-xl border-0 h-full bg-white rounded-lg">
                            <div class="p-6 pb-8">
                                <h3 class="text-3xl font-bold {{ $textAlign }}" style="color: #f59c00;">
                                    {{ $isRtl ? 'أرسل لنا رسالة' : 'Send us a Message' }}
                                </h3>
                                <p class="text-gray-600 text-lg mt-2 {{ $textAlign }}">
                                    {{ $isRtl
                                        ? 'املأ النموذج أدناه وسنعود إليك في أقرب وقت ممكن.'
                                        : 'Fill out the form below and we\'ll get back to you as soon as possible.' }}
                                </p>
                            </div>
                            <div class="p-6 pt-0">
                                <form action="{{ route('contact.submit', ['lang' => app()->getLocale()]) }}"
                                    method="POST" class="space-y-6">
                                    @csrf
                                    <!-- Add the success/error messages here -->
                                    @if (session('success'))
                                        <div
                                            class="p-4 bg-green-100 border border-green-400 text-green-700 rounded {{ $textAlign }}">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div
                                            class="p-4 bg-red-100 border border-red-400 text-red-700 rounded {{ $textAlign }}">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-semibold mb-2 {{ $textAlign }}"
                                                style="color: #f59c00;">
                                                {{ $isRtl ? 'الاسم الكامل *' : 'Full Name *' }}
                                            </label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="{{ $isRtl ? 'أحمد محمد' : 'John Doe' }}" required
                                                class="h-12 border-2 focus:border-red-300 transition-colors w-full px-3 py-2 border-gray-300 rounded-md {{ $textAlign }}" />
                                            @error('name')
                                                <p class="text-red-500 text-sm mt-1 {{ $textAlign }}">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold mb-2 {{ $textAlign }}"
                                                style="color: #f59c00;">
                                                {{ $isRtl ? 'عنوان البريد الإلكتروني *' : 'Email Address *' }}
                                            </label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="{{ $isRtl ? 'ahmed@company.com' : 'john@company.com' }}"
                                                required
                                                class="h-12 border-2 focus:border-red-300 transition-colors w-full px-3 py-2 border-gray-300 rounded-md {{ $textAlign }}" />
                                            @error('email')
                                                <p class="text-red-500 text-sm mt-1 {{ $textAlign }}">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-semibold mb-2 {{ $textAlign }}"
                                                style="color: #f59c00;">
                                                {{ $isRtl ? 'رقم الهاتف' : 'Phone Number' }}
                                            </label>
                                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                                placeholder="{{ $isRtl ? '+966 50 123 4567' : '+1 (555) 123-4567' }}"
                                                class="h-12 border-2 focus:border-red-300 transition-colors w-full px-3 py-2 border-gray-300 rounded-md {{ $textAlign }}" />
                                            @error('phone')
                                                <p class="text-red-500 text-sm mt-1 {{ $textAlign }}">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold mb-2 {{ $textAlign }}"
                                                style="color: #f59c00;">
                                                {{ $isRtl ? 'الشركة' : 'Company' }}
                                            </label>
                                            <input type="text" name="company" value="{{ old('company') }}"
                                                placeholder="{{ $isRtl ? 'شركتك' : 'Your Company' }}"
                                                class="h-12 border-2 focus:border-red-300 transition-colors w-full px-3 py-2 border-gray-300 rounded-md {{ $textAlign }}" />
                                            @error('company')
                                                <p class="text-red-500 text-sm mt-1 {{ $textAlign }}">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold mb-2 {{ $textAlign }}"
                                            style="color: #f59c00;">
                                            {{ $isRtl ? 'الموضوع *' : 'Subject *' }}
                                        </label>
                                        <input type="text" name="subject" value="{{ old('subject') }}"
                                            placeholder="{{ $isRtl ? 'كيف يمكننا مساعدتك؟' : 'How can we help you?' }}"
                                            required
                                            class="h-12 border-2 focus:border-red-300 transition-colors w-full px-3 py-2 border-gray-300 rounded-md {{ $textAlign }}" />
                                        @error('subject')
                                            <p class="text-red-500 text-sm mt-1 {{ $textAlign }}">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold mb-2 {{ $textAlign }}"
                                            style="color: #f59c00;">
                                            {{ $isRtl ? 'الرسالة *' : 'Message *' }}
                                        </label>
                                        <textarea name="message" placeholder="{{ $isRtl ? 'أخبرنا عن مشروعك...' : 'Tell us about your project...' }}" required
                                            rows="6"
                                            class="border-2 focus:border-red-300 transition-colors resize-none w-full px-3 py-2 border-gray-300 rounded-md {{ $textAlign }}">{{ old('message') }}</textarea>
                                        @error('message')
                                            <p class="text-red-500 text-sm mt-1 {{ $textAlign }}">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="w-full h-14 text-lg font-semibold transition-all duration-300 hover:scale-[1.02] disabled:scale-100 flex items-center justify-center"
                                        style="background-color: #f59c00; color: #fcf7f9;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="h-5 w-5 {{ $marginRight }}">
                                            <path d="m22 2-7 20-4-9-9-4Z" />
                                            <path d="M22 2 11 13" />
                                        </svg>
                                        {{ $isRtl ? 'إرسال الرسالة' : 'Send Message' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-3xl font-bold mb-6 {{ $textAlign }}" style="color: #f59c00;">
                                {{ $isRtl ? 'معلومات الاتصال' : 'Contact Information' }}
                            </h2>
                            <p class="text-gray-600 text-lg mb-8 {{ $textAlign }}">
                                {{ $isRtl
                                    ? 'مستعد للبدء؟ تواصل معنا من خلال أي من القنوات التالية.'
                                    : 'Ready to get started? Reach out to us through any of the following channels.' }}
                            </p>
                        </div>

                        <div class="space-y-6">
                            <div class="p-6 {{ $borderLeft }} transition-all duration-300 hover:shadow-lg hover:scale-[1.02] bg-white rounded-lg shadow"
                                style="border-left-color: #f59c00;">
                                <div class="flex items-center space-x-4 {{ $flexReverse }}">
                                    <div class="p-3 rounded-full" style="background-color: #fcf7f9;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            style="color: #f59c00;">
                                            <rect width="20" height="16" x="2" y="4" rx="2" />
                                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                        </svg>
                                    </div>
                                    <div class="{{ $textAlign }}">
                                        <h3 class="font-semibold text-lg" style="color: #f59c00;">
                                            {{ $isRtl ? 'راسلنا عبر البريد الإلكتروني' : 'Email Us' }}</h3>
                                        <a href="mailto:info@fid.sa" class="text-gray-600">info@fid.sa</a>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 {{ $borderLeft }} transition-all duration-300 hover:shadow-lg hover:scale-[1.02] bg-white rounded-lg shadow"
                                style="border-left-color: #f59c00;">
                                <div class="flex items-center space-x-4 {{ $flexReverse }}">
                                    <div class="p-3 rounded-full" style="background-color: #fcf7f9;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            style="color: #f59c00;">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                        </svg>
                                    </div>
                                    <div class="{{ $textAlign }}">
                                        <h3 class="font-semibold text-lg" style="color: #f59c00;">
                                            {{ $isRtl ? 'اتصل بنا' : 'Call Us' }}</h3>
                                        <a href="tel:+966502057206" class="text-gray-600">+966 50 205 7206</a>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 {{ $borderLeft }} transition-all duration-300 hover:shadow-lg hover:scale-[1.02] bg-white rounded-lg shadow"
                                style="border-left-color: #f59c00;">
                                <div class="flex items-center space-x-4 {{ $flexReverse }}">
                                    <div class="p-3 rounded-full" style="background-color: #fcf7f9;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            style="color: #f59c00;">
                                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                            <circle cx="12" cy="10" r="3" />
                                        </svg>
                                    </div>
                                    <div class="{{ $textAlign }}">
                                        <h3 class="font-semibold text-lg" style="color: #f59c00;">
                                            {{ $isRtl ? 'زورنا' : 'Visit Us' }}</h3>
                                        <p class="text-gray-600">
                                            {{ $isRtl ? '123 شارع التكنولوجيا، مدينة الابتكار، كاليفورنيا 90210' : '123 Tech Street, Innovation City, CA 90210' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="pt-8">
                            <h3 class="text-xl font-semibold mb-4 {{ $textAlign }}" style="color: #f59c00;">
                                {{ $isRtl ? 'تابعنا' : 'Follow Us' }}
                            </h3>
                            <div
                                class="flex {{ $isRtl ? 'justify-end' : 'justify-start' }} space-x-4 {{ $spaceReverse }}">
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="p-3 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                                    style="background-color: #f59c00; color: #fcf7f9;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                        <rect width="4" height="12" x="2" y="9" />
                                        <circle cx="4" cy="4" r="2" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="p-3 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                                    style="background-color: #f59c00; color: #fcf7f9;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M22 4s-.7 2.1-2 3.4c1.6 1.4 3.3 4.9 3.3 4.9s-1.4-.6-2.8-.9c-1.2 2.1-2.9 3.4-4.8 3.4-3.3 0-6-2.7-6-6s2.7-6 6-6c.3 0 .6 0 .9.1C15.3 7.4 17 4 17 4s-2.7 1.4-5.2 1.4c-1.7 0-3.3-.5-4.6-1.5-1.2 1.2-1.9 2.8-1.9 4.6 0 3.9 3.1 7 7 7 3.9 0 7-3.1 7-7 0-1.2-.3-2.3-.8-3.2.8-.3 1.6-.7 2.3-1.2z" />
                                    </svg>
                                </a>
                                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="p-3 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                                    style="background-color: #f59c00; color: #fcf7f9;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                    </svg>
                                </a>
                                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="p-3 rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg"
                                    style="background-color: #f59c00; color: #fcf7f9;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="20" x="2" y="2" rx="5"
                                            ry="5" />
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- map address link from google maps --}}
        <section id="offices" class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold mb-6 {{ $textAlignCenter }}" style="color: #f59c00;">
                    {{ $isRtl ? 'مكاتبنا' : 'Our Offices' }}
                </h2>
                <div class="w-full h-96 rounded-lg overflow-hidden shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3788.346392666532!2d42.73955192418302!3d18.285760576303467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15fb590042e61985%3A0x44221e7a409c777!2z2LTYsdmD2Kkg2YHZitivINmE2YTYqtiz2YjZitmCINmI2KfZhNio2LHZhdis2YrYp9iq!5e0!3m2!1sar!2ssa!4v1757784073389!5m2!1sar!2ssa"
                        width="100%" height="100%" style="border:0;" allowfullscreen="true" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>


                <!-- Final CTA Section -->
                <section class="py-20 px-4 sm:px-6 lg:px-8 {{ $textAlignCenter }}"
                    style="background-color: #002a4d;">
                    <div class="max-w-4xl mx-auto text-white">
                        <h2 class="text-4xl md:text-5xl font-bold mb-6">
                            {{ $isRtl ? 'مستعد للبدء؟' : 'Ready to Get Started?' }}
                        </h2>
                        <p class="text-xl mb-8 opacity-90">
                            {{ $isRtl
                                ? 'دعنا نحوّل أفكارك إلى واقع. تواصل معنا اليوم للحصول على استشارة مجانية.'
                                : 'Let\'s transform your ideas into reality. Contact us today for a free consultation.' }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button
                                class="px-8 py-6 text-lg font-semibold bg-white hover:bg-gray-100 transition-all duration-300 hover:scale-105 rounded-md flex items-center justify-center"
                                style="color: #f59c00;"
                                onclick="document.getElementById('contact-form').scrollIntoView({ behavior: 'smooth' })">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="h-5 w-5 {{ $marginRight }}">
                                    <path d="m22 2-7 20-4-9-9-4Z" />
                                    <path d="M22 2 11 13" />
                                </svg>
                                {{ $isRtl ? 'ابدأ الآن' : 'Get Started Now' }}
                            </button>
                            <button
                                class="px-8 py-6 text-lg font-semibold border-2 border-white text-white hover:bg-white hover:text-[#f59c00] transition-all duration-300 hover:scale-105 rounded-md flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="h-5 w-5 {{ $marginRight }}">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                                {{ $isRtl ? 'جد مكالمة' : 'Schedule a Call' }}
                            </button>
                        </div>
                    </div>
                </section>
            </div>
</x-master-layout>
