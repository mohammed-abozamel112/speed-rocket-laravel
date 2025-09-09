<x-master-layout>
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
        <div class="flex h-screen w-full" style="background: {{ asset('storage/' . $service->image) }}">
            <div class="m-auto">
                <h1 class="text-2xl font-bold mb-4">{{ $service->name }}</h1>
                <p class="text-gray-700">{{ $service->short_description }}</p>
            </div>
        </div>
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
                        <h2 class="text-2xl text-[#a31621] lg:text-3xl font-semibold mb-4 animate-on-scroll">
                        {{ $tag->name }}
                    </h2>
                    </a>
                    <p class="text-gray-600 mb-4 text-base lg:text-lg animate-on-scroll">
                        {{ $tag->description }}
                    </p>

                    @if ($tag->link)
                        <a href="{{ $tag->link }}"
                            class="mt-4 inline-block px-6 py-2 bg-[#A31621] text-white rounded-full hover:bg-[#A31621]/90 transition animate-on-scroll">
                            {{ app()->getLocale() === 'en' ? 'Learn More' : 'المزيد' }}
                        </a>
                    @endif
                </div>
            </section>
        @endforeach
    @endguest

</x-master-layout>
