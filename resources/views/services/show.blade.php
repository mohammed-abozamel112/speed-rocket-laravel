<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
    @endphp
    @auth
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mb-4">{{ $service->title }}</h1>

            @if ($service->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                        class="max-w-full h-auto rounded">
                </div>
            @endif

            <div class="mb-4">
                <p>{!! nl2br(e($service->description)) !!}</p>
            </div>

            <div class="text-gray-600 text-sm mb-4">
                Created at: {{ $service->created_at->format('Y-m-d H:i') }}
            </div>

            <div>
                <a href="{{ route('services.index', ['lang' => app()->getLocale()]) }}"
                    class="text-blue-600 hover:underline">Back to Services</a>
            </div>
        </div>
    @endauth
    @guest
        {{-- get the current service and its tags service h-screen w-full and content in the right middle
        --}}

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
                @foreach ($servicesImages as $slider)
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
                            <p class="text-white">{{ $slider->caption }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="flex h-screen w-full" style="background: {{ asset('storage/' . $service->image) }}">
            <div class="m-auto">
                <h1 class="text-2xl font-bold mb-4">{{ $service->name }}</h1>
                <p class="text-gray-700">{{ $service->short_description }}</p>
            </div>
        </div> --}}
        @foreach ($tags as $tag)
            <section
                class="flex flex-col lg:flex-row gap-6 lg:gap-12 p-4 lg:p-8 w-full lg:max-w-6xl mx-auto min-h-auto lg:min-h-[80vh] {{ $loop->even ? 'lg:flex-row-reverse' : '' }} animate-on-scroll">

                {{-- Image --}}
                <div
                    class="w-full lg:w-1/2 max-w-full lg:max-w-none h-auto m-auto flex rounded-full overflow-hidden border animate-on-scroll {{ $loop->even ? 'animate-from-right' : 'animate-from-left' }}">
                    <img onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                        src="{{ asset('storage/' . $tag->image) }}" alt="{{ $tag->name }}"
                        class="w-full h-full object-cover">
                </div>

                {{-- Content --}}
                <div class="flex flex-col justify-center p-4 lg:p-8 w-full lg:w-1/2">
                    <a href="{{ route('tags.show', ['tag' => $tag, 'lang' => app()->getLocale()]) }}">
                        <h2 class="text-2xl text-[#f59c00] lg:text-3xl font-semibold mb-4 animate-on-scroll">
                            {{ $tag->name }}
                        </h2>
                    </a>
                    <p class="text-gray-600 mb-4 text-base lg:text-lg animate-on-scroll">
                        {{ $tag->description }}
                    </p>

                    @if ($tag->link)
                        <a href="{{ $tag->link }}"
                            class="mt-4 inline-block px-6 py-2 bg-[#f59c00] text-white rounded-full hover:bg-[#f59c00]/90 transition animate-on-scroll">
                            {{ app()->getLocale() === 'en' ? 'Learn More' : 'المزيد' }}
                        </a>
                    @endif
                </div>
            </section>
        @endforeach
    @endguest

</x-master-layout>
