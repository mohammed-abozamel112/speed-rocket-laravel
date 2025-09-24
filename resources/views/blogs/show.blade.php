<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
    @endphp
    <x-slot name="head">
        <x-seo :title="$blog->title ?? 'Default Title'" :description="Str::limit($blog->description, 150)" :keywords="$keywords ?? 'default, keywords'" :canonical="url()->current()" :og-title="$blog->title ?? null"
            :og-description="$blog->description ?? null" :og-image="$blog->image ? asset('storage/' . $blog->image) : null" :twitter-card="$blog->image ? asset('storage/' . $blog->image) : null" :twitter-site="$twitterSite ?? null" :twitter-creator="$twitterCreator ?? null" />
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
        {{-- comments section --}}

        <div class="mt-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">
                {{ app()->getLocale() === 'en' ? 'Comments' : 'التعليقات' }}
            </h3>
            @if ($blog->comments && $blog->comments->count() > 0)
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($blog->comments as $comment)
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
                                <img loading="lazy" src="{{ $comment->image ?? asset('storage/profile.png') }}"
                                    onerror="this.onerror=null; this.src='{{ asset('storage/profile.png') }}'"
                                    alt="{{ $comment->name }}"
                                    class="w-16 h-16 rounded-full object-cover {{ $isRtl ? 'mr-4' : 'ml-4' }}">
                                <div class="{{ $isRtl ? 'text-right' : 'text-left' }}">
                                    <h4 class="text-lg font-semibold text-[#f59c00]">{{ $comment->name }}</h4>
                                </div>
                            </div>

                            <p class="text-gray-600 leading-relaxed italic {{ $isRtl ? 'text-right' : 'text-left' }}">
                                "{{ $comment->comment }}"
                            </p>
                            <div class="flex my-4 text-yellow-400 justify-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < ($comment->rate ?? 5))
                                        &#9733;
                                    @else
                                        <span class="text-gray-300">&#9733;</span>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">
                    {{ app()->getLocale() === 'en' ? 'No comments yet. Be the first to comment!' : 'لا توجد تعليقات بعد. كن أول من يعلق!' }}
                </p>
            @endif
        </div>
        {{-- form to add comment ajax --}}
        <div class="mt-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">
                {{ app()->getLocale() === 'en' ? 'Add a Comment' : 'أضف تعليقًا' }}
            </h3>
            <form id="commentForm" method="POST"
                action="{{ route('comments.store', ['lang' => app()->getLocale()]) }}">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">
                        {{ app()->getLocale() === 'en' ? 'Name' : 'الاسم' }}
                    </label>
                    <input type="text" id="name" name="name" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#f59c00]">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">
                        {{ app()->getLocale() === 'en' ? 'Email' : 'البريد الإلكتروني' }}
                    </label>
                    <input type="email" id="email" name="email" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#f59c00]">
                </div>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-gray-700 font-semibold mb-2">
                        {{ app()->getLocale() === 'en' ? 'Comment' : 'التعليق' }}
                    </label>
                    <textarea id="comment" name="comment" rows="4" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#f59c00]"></textarea>
                </div>
                {{-- rate --}}
                <style>
                    .rating-component .rating {
                        display: flex;
                        gap: 0.25rem;
                        align-items: center;
                        justify-content: flex-start;
                        --stroke: #C7CCC7;
                        --fill: #FFA534;
                    }

                    /* visually hide native radio but keep it accessible/focusable */
                    .rating-component .rating input {
                        position: absolute;
                        opacity: 0;
                        width: 0;
                        height: 0;
                    }

                    .rating-component .rating label {
                        cursor: pointer;
                        display: inline-flex;
                    }

                    .rating-component .rating svg {
                        width: 1.8rem;
                        height: 1.8rem;
                        fill: transparent;
                        stroke: var(--stroke);
                        stroke-linejoin: bevel;
                        transition: stroke .15s, fill .15s, transform .08s;
                    }

                    /* hover fills this star and all stars to its right (since markup is 5..1) */
                    .rating-component .rating label:hover svg,
                    .rating-component .rating label:hover~label svg {
                        stroke: var(--fill);
                    }

                    /* checked fills this star and all stars to its right */
                    .rating-component .rating input:checked~label svg {
                        fill: var(--fill);
                        stroke: var(--fill);
                        transform: scale(1.05);
                    }

                    .rating-component .sr-only {
                        position: absolute !important;
                        height: 1px;
                        width: 1px;
                        overflow: hidden;
                        clip: rect(1px, 1px, 1px, 1px);
                        white-space: nowrap;
                    }
                </style>

                <div class="rating-component mb-4 flex flex-col place-items-center" aria-label="{{ __('Rating') }}">
                    <span class="block text-gray-700 font-semibold mb-2">{{ app()->getLocale()==='en'?'Rating':'التقييم' }}</span>
                    <div class="rating" role="radiogroup">
                        {{-- highest star on the left (5 .. 1) --}}
                        <input type="radio" id="star-5" name="rate" value="5"
                            {{ old('rate') == 5 ? 'checked' : '' }} required>
                        <label for="star-5" title="5 stars" aria-label="5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img"
                                aria-hidden="true">
                                <path
                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                            </svg>
                        </label>

                        <input type="radio" id="star-4" name="rate" value="4"
                            {{ old('rate') == 4 ? 'checked' : '' }}>
                        <label for="star-4" title="4 stars" aria-label="4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img"
                                aria-hidden="true">
                                <path
                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                            </svg>
                        </label>

                        <input type="radio" id="star-3" name="rate" value="3"
                            {{ old('rate') == 3 ? 'checked' : '' }}>
                        <label for="star-3" title="3 stars" aria-label="3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img"
                                aria-hidden="true">
                                <path
                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                            </svg>
                        </label>

                        <input type="radio" id="star-2" name="rate" value="2"
                            {{ old('rate') == 2 ? 'checked' : '' }}>
                        <label for="star-2" title="2 stars" aria-label="2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img"
                                aria-hidden="true">
                                <path
                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                            </svg>
                        </label>

                        <input type="radio" id="star-1" name="rate" value="1"
                            {{ old('rate') == 1 ? 'checked' : '' }}>
                        <label for="star-1" title="1 star" aria-label="1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img"
                                aria-hidden="true">
                                <path
                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                            </svg>
                        </label>
                    </div>
                </div>
                <button type="submit"
                    class="bg-[#f59c00] hover:bg-[#f59b00c9] text-white px-6 py-2 rounded-lg font-semibold transition-colors w-full m-auto">
                    {{ app()->getLocale() === 'en' ? 'Submit Comment' : 'إرسال التعليق' }}
                </button>
            </form>
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
