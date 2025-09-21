<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
    @endphp
    @auth
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold text-gray-900">{{ $tag->name }}</h1>
                <div class="flex space-x-2">
                    @auth
                        <a href="{{ route('tags.edit', [$tag, 'lang' => app()->getLocale()]) }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            Edit
                        </a>
                    @endauth
                    <a href="{{ route('tags.index', ['lang' => app()->getLocale()]) }}"
                        class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
                        Back to Tags
                    </a>
                </div>
            </div>
        </x-slot>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Tag Information -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tag Details</h3>
                        <dl class="space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Name (Arabic)</dt>
                                <dd class="text-sm text-gray-900">{{ $tag->name_ar ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Name (English)</dt>
                                <dd class="text-sm text-gray-900">{{ $tag->name_en ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Description</dt>
                                <dd class="text-sm text-gray-900">{{ $tag->description ?? 'No description available' }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Additional Information</h3>
                        <dl class="space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Created</dt>
                                <dd class="text-sm text-gray-900">{{ $tag->created_at->format('M d, Y H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Updated</dt>
                                <dd class="text-sm text-gray-900">{{ $tag->updated_at->format('M d, Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Related Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Related Projects -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Related Projects</h3>
                    @if ($tag->projects->count() > 0)
                        <div class="space-y-4">
                            @foreach ($tag->projects as $project)
                                <div class="border-l-4 border-blue-500 pl-4">
                                    <h4 class="font-medium text-gray-900">
                                        <a href="{{ route('projects.show', [$project, 'lang' => app()->getLocale()]) }}"
                                            class="hover:text-blue-600">
                                            {{ $project->title }}
                                        </a>
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($project->description, 100) }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">No projects associated with this tag.</p>
                    @endif
                </div>

                <!-- Related Blogs -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Related Blogs</h3>
                    @if ($tag->blog)
                        <div class="space-y-4">
                            <div class="border-l-4 border-green-500 pl-4">
                                <h4 class="font-medium text-gray-900">
                                    <a href="{{ route('blogs.show', [$tag->blog, 'lang' => app()->getLocale()]) }}"
                                        class="hover:text-green-600">
                                        {{ $tag->blog->title }}
                                    </a>
                                </h4>
                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($tag->blog->short_description, 100) }}
                                </p>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 italic">No blog posts associated with this tag.</p>
                    @endif
                </div>
            </div>

            <!-- Additional Content Sections -->
            @if ($tag->subtitle1 || $tag->subtitle1_description)
                <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $tag->subtitle1 ?? 'Additional Information' }}
                    </h3>
                    <p class="text-gray-700">{{ $tag->subtitle1_description ?? '' }}</p>
                </div>
            @endif

            @if ($tag->subtitle2 || $tag->subtitle2_description)
                <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $tag->subtitle2 ?? 'More Details' }}</h3>
                    <p class="text-gray-700">{{ $tag->subtitle2_description ?? '' }}</p>
                </div>
            @endif

            @if ($tag->subtitle3 || $tag->subtitle3_description)
                <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $tag->subtitle3 ?? 'Final Notes' }}</h3>
                    <p class="text-gray-700">{{ $tag->subtitle3_description ?? '' }}</p>
                </div>
            @endif
        </div>
    @endauth
    @guest

        <style>
            .slide:hover {
                flex: 6;
            }

            .slide {
                transition: all 1200ms ease-in-out;
            }

            .vertical-text {
                writing-mode: vertical-lr;
                transform: rotate(180deg);
                transform-origin: center center;
            }

            @media (max-width: 768px) {
                .vertical-text {
                    writing-mode: horizontal-tb;
                    transform: rotate(0deg);
                }
            }
        </style>
        <div class="flex w-full h-screen pt-0 items-center justify-center">
            <div class="flex flex-col md:flex-row w-full h-[100%]">
                @foreach ($imagesTag as $slider)
                    <div class="slide relative flex-auto bg-cover bg-center transition-all duration-500 ease-in-out hover:flex-grow group"
                        style="background-image:url('{{ asset('storage/' . $slider->image) }}')">

                        <div
                            class="w-full absolute inset-y-0 left-0 flex md:items-center justify-center md:justify-start items-end pointer-events-none p-4
                            transition-opacity duration-300 group-hover:opacity-0">
                            <h2 class="text-[#f59c00] text-8xl font-bold vertical-text py-2">{{ $slider->name }}</h2>
                        </div>

                        <div
                            class="absolute {{ $isRtl ? 'bottom-0 right-0' : 'bottom-0 left-0' }} inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h2 class="text-[#f59c00] text-6xl font-bold leading-normal">{{ $slider->name }}</h2>
                            <p class="text-white max-w-[90%] sm:max-w-[70%] text-justify">{{ $slider->caption }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- create from $imagesTag with creative view not the same as above  --}}
        <style>
            .cardtag {
                position: relative;
                overflow: hidden;
            }

            .cardtag::before {
                content: "";
                position: absolute;
                width: 100%;
                height: 100%;
                z-index: 0;
                transition: clip-path 0.6s;
                background-color: #f59c00;
            }

            .cardtag:hover {
                box-shadow: 0.063rem 0.063rem 1.25rem 0.375rem rgb(0 0 0 / 53%);
            }

            /* Base clip-path for all cards, adjusted per child later */
            .cardtag:nth-child(1)::before {
                bottom: 0;
                right: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 100% 100%);
            }

            .cardtag:nth-child(2)::before {
                bottom: 0;
                left: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 0% 100%);
            }

            .cardtag:nth-child(3)::before {
                top: 0;
                right: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 100% 0%);
            }

            .cardtag:nth-child(4)::before {
                top: 0;
                left: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 0% 0%);
            }

            .cardtag:hover::before {
                clip-path: circle(110vw at center);
            }

            .cardtag p {
                transition: color 0.8s;
            }

            .cardtag:hover p {
                color: #fff;
            }

            .circle {
                position: absolute;
                width: 100%;
                height: 100%;
                z-index: 0;
                transition: clip-path 0.6s;
                background-repeat: no-repeat;
                background-position: 50% 50%;
                background-size: cover;
            }

            .cardtag:hover .circle {
                clip-path: circle(0);
            }

            .cardtag:nth-child(1) .circle {

                bottom: 0;
                right: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 100% 100%);
            }

            .cardtag:nth-child(2) .circle {

                bottom: 0;
                left: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 0% 100%);
            }

            .cardtag:nth-child(3) .circle {

                top: 0;
                right: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 100% 0%);
            }

            .cardtag:nth-child(4) .circle {

                top: 0;
                left: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 0% 0%);
            }

            /* RTL overrides */
            [dir="rtl"] .cardtag:hover::before {
                clip-path: circle(110vw at center) !important;
            }
            [dir="rtl"] .cardtag:nth-child(1)::before {
                bottom: 0;
                left: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 0% 100%);
            }

            [dir="rtl"] .cardtag:nth-child(2)::before {
                bottom: 0;
                right: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 100% 100%);
            }

            [dir="rtl"] .cardtag:nth-child(3)::before {
                top: 0;
                left: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 0% 0%);
            }

            [dir="rtl"] .cardtag:nth-child(4)::before {
                top: 0;
                right: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 100% 0%);
            }

            [dir="rtl"] .cardtag:nth-child(1) .circle {
                bottom: 0;
                left: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 0% 100%);
            }

            [dir="rtl"] .cardtag:nth-child(2) .circle {
                bottom: 0;
                right: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 100% 100%);
            }

            [dir="rtl"] .cardtag:nth-child(3) .circle {
                top: 0;
                left: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 0% 0%);
            }

            [dir="rtl"] .cardtag:nth-child(4) .circle {
                top: 0;
                right: 0;
                clip-path: circle(calc(6.25rem + 7.5vw) at 100% 0%);
            }
        </style>
        <section class="min-h-screen bg-gray-900 text-center py-20 px-8 xl:px-0 flex flex-col justify-center">
            <span class="text-gray-400 text-lg max-w-lg mx-auto mb-2 capitalize flex items-center">{{app()->getLocale()==='en'?'we are offering some images':'نعرض بعض الصور '}} <svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-[#f59c00] ml-3 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </span>
            <h1 class="text-white text-4xl md:text-5xl xl:text-6xl font-semibold max-w-3xl mx-auto mb-16 leading-snug">
                {{app()->getLocale()==='en'?'new way to explore':'طريقة جديدة للاستكشاف'}}</h1>
            @foreach ($imagesTags->chunk(4) as $chunk)
                <div class="grid-offer grid sm:grid-cols-2 md:grid-cols-2 gap-5 max-w-5xl mx-auto mb-8">
                    @foreach ($chunk as $image)
                        <div class="cardtag bg-gray-800 p-10 relative min-h-[18rem]">
                            <div class="circle overflow-hidden"
                                style="background-image: url('{{ asset('storage/' . $image->image) }}');">

                            </div>
                            <div class="relative {{ $isRtl ? 'lg:pl-52' : 'lg:pr-52' }}">
                                <h2 class="capitalize text-white mb-4 text-2xl xl:text-3xl">{{ $image->name }}</h2>
                                <p class="text-gray-400">{{ Str::limit($image->caption, 120) }}</p>
                            </div>
                            <div class="icon"></div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>
    @endguest
</x-master-layout>
