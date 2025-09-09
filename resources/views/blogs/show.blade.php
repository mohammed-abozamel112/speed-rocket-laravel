<x-master-layout>
    <x-slot name="header">
        <meta name="description" content="{{ Str::limit($blog->short_description, 160) }}">
        <meta property="og:title" content="{{ $blog->title }}">
        <meta property="og:description" content="{{ Str::limit($blog->short_description, 160) }}">
        @if ($blog->image)
            <meta property="og:image" content="{{ asset('storage/' . $blog->image) }}">
        @endif
        <meta property="og:type" content="article">
        <meta property="article:published_time" content="{{ $blog->created_at->toIso8601String() }}">
        <meta property="article:author" content="{{ $blog->user->name ?? 'Admin' }}">
    </x-slot>

    <article class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('blogs.index', ['lang' => app()->getLocale()]) }}"
                class="inline-flex items-center text-[#f59c00] hover:text-[#f59b00c9] transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                {{ app()->getLocale() === 'en' ? 'Back to Blogs' : 'العودة إلى المدونات' }}
            </a>
        </div>

        <!-- Blog Header -->
        <header class="mb-8">


            @if ($blog->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                        class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg"
                        onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'">
                </div>
            @endif
            <h1 class="text-4xl font-bold text-[#f59c00] mb-4 leading-tight">
                {{ $blog->title }}
            </h1>

            <div class="flex items-center text-sm text-gray-600 mb-4">
                <span class="mr-4">
                    <i class="fas fa-user mr-1"></i>
                    {{ $blog->user->name ?? 'Admin' }}
                </span>
                <span class="mr-4">
                    <i class="fas fa-calendar mr-1"></i>
                    {{ $blog->created_at->format('M d, Y') }}
                </span>
                <span class="mr-4">
                    <i class="fas fa-clock mr-1"></i>
                    {{ $blog->created_at->diffForHumans() }}
                </span>
                <span
                    class="bg-{{ $blog->status === 'published' ? 'green' : '#f59c00' }}-100 text-{{ $blog->status === 'published' ? 'green' : 'yellow' }}-800 px-2 py-1 rounded-full text-xs">
                    {{ ucfirst($blog->status) }}
                </span>
            </div>
            <!-- Tags Section -->
            @if ($blog->tags && $blog->tags->count() > 0)
                <section class="mt-8 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap gap-2">
                        @foreach ($blog->tags as $tag)
                            <span class="bg-[#f59c00] text-white px-3 py-1 rounded-full text-sm">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </section>
            @endif
        </header>


        <!-- Short Description -->
        @if ($blog->short_description)
            <section class="mb-8">
                <div class="p-6 rounded-lg">
                    <p class="text-lg text-[#f59c00] leading-relaxed">
                        {{ $blog->short_description }}
                    </p>
                </div>
            </section>
        @endif

        <!-- Content Sections -->
        <div class="prose prose-lg max-w-none">
            <!-- Section 1 -->
            @if ($blog->sub_title1 || $blog->description1)
                <section class="mb-8">
                    @if ($blog->sub_title1)
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">
                            {{ $blog->sub_title1 }}
                        </h2>
                    @endif
                    @if ($blog->description1)
                        <div class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($blog->description1)) !!}
                        </div>
                    @endif
                </section>
            @endif

            <!-- Section 2 -->
            @if ($blog->sub_title2 || $blog->description2)
                <section class="mb-8">
                    @if ($blog->sub_title2)
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">
                            {{ $blog->sub_title2 }}
                        </h2>
                    @endif
                    @if ($blog->description2)
                        <div class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($blog->description2)) !!}
                        </div>
                    @endif
                </section>
            @endif

            <!-- Section 3 -->
            @if ($blog->sub_title3 || $blog->description3)
                <section class="mb-8">
                    @if ($blog->sub_title3)
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">
                            {{ $blog->sub_title3 }}
                        </h2>
                    @endif
                    @if ($blog->description3)
                        <div class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($blog->description3)) !!}
                        </div>
                    @endif
                </section>
            @endif
        </div>



        <!-- Share Section -->
        <section class="mt-8 pt-8 border-t border-gray-200">
            <h3 class="text-lg font-semibold     text-gray-900 mb-4">
                {{ app()->getLocale() === 'en' ? 'Share this article' : 'شارك هذا المقال' }}
            </h3>
            <div class="flex gap-4">
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}"
                    class="bg-[#f59c00] hover:text-[#f59c00] hover:bg-[#f59b0034] text-white px-4 py-2 rounded transition-colors"
                    target="_blank" rel="noopener">
                    Twitter
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                    class="bg-[#f59c00] hover:text-[#f59c00] hover:bg-[#f59b0034] text-white px-4 py-2 rounded transition-colors"
                    target="_blank" rel="noopener">
                    Facebook
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                    class="bg-[#f59c00] hover:text-[#f59c00] hover:bg-[#f59b0034] text-white px-4 py-2 rounded transition-colors"
                    target="_blank" rel="noopener">
                    LinkedIn
                </a>
            </div>
        </section>
    </article>
</x-master-layout>
