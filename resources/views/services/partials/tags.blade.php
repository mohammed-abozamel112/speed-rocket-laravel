@foreach ($filteredTags as $tag)
    <section
        class="flex flex-col lg:flex-row gap-6 lg:gap-12 p-4 lg:p-8 w-full lg:max-w-6xl mx-auto min-h-auto lg:min-h-[80vh] {{ $loop->even ? 'lg:flex-row-reverse' : '' }} animate-on-scroll">

        {{-- Image --}}
        <div
            class="w-full lg:w-1/2 max-w-full lg:max-w-none h-auto m-auto flex rounded-full overflow-hidden border animate-on-scroll {{ $loop->even ? 'animate-from-right' : 'animate-from-left' }}">
            <img onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                src="{{ asset('storage/' . $tag->image) }}" alt="{{ $tag->name }}" class="w-full h-full object-cover">
        </div>

        {{-- Content --}}
        <div class="flex flex-col justify-center p-4 lg:p-8 w-full lg:w-1/2">
            <h2 class="text-2xl lg:text-3xl font-semibold mb-4 animate-on-scroll">
                {{ $tag->name }}
            </h2>
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
