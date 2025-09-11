<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
    @endphp
    @auth
        <div class="container mx-auto p-4">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('tags.create', ['lang' => app()->getLocale()]) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create New Tag
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">
                                {{ app()->getLocale() === 'en' ? 'Name' : 'الاسم' }}</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">
                                {{ app()->getLocale() === 'en' ? 'Slug' : 'الرابط' }}</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">
                                {{ app()->getLocale() === 'en' ? 'Created At' : 'تاريخ الإنشاء' }}</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $tag)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $tag->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $tag->slug }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $tag->created_at->format('Y-m-d') }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <a href="{{ route('tags.show', ['tag' => $tag, 'lang' => app()->getLocale()]) }}"
                                        class="text-blue-600 hover:underline mr-2">View</a>
                                    <a href="{{ route('tags.edit', ['tag' => $tag, 'lang' => app()->getLocale()]) }}"
                                        class="text-yellow-600 hover:underline mr-2">Edit</a>
                                    <form
                                        action="{{ route('tags.destroy', ['tag' => $tag, 'lang' => app()->getLocale()]) }}"
                                        method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this tag?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 px-4 text-center text-gray-500">No tags found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $tags->links() }}
            </div>
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
        <div class="flex w-full h-screen pt-0 pb-4 items-center justify-center">
            <div class="flex flex-col md:flex-row w-full h-[100%]">
                @foreach ($tagsImages as $slider)
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

        <div class="mb-12 text-center">
            {{-- Filter Buttons --}}
            <div class="flex flex-wrap justify-center gap-3">
                @php
                    $btnBase = 'px-4 py-2 rounded-full text-sm font-medium transition';
                    $btnStyle = 'bg-[#f59c00]/10 text-[#f59c00] hover:bg-[#f59c00]/20';
                @endphp

                {{-- All Button --}}
                <button class="{{ $btnBase }} {{ $btnStyle }}" onclick="filterPortfolio('')"
                    aria-label="Show All Projects">
                    {{ app()->getLocale() === 'en' ? 'All' : 'الكل' }}
                </button>

                {{-- Dynamic Tags --}}
                @foreach ($tags as $tag)
                    <button class="{{ $btnBase }} {{ $btnStyle }}"
                        onclick="filterPortfolio('{{ $tag->id }}')" aria-label="Filter by {{ $tag->name }}">
                        {{ $tag->name }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Portfolio Sections --}}
        <div class="space-y-16">
            @foreach ($tags as $index => $tag)
                <section
                    class="portfolio-card flex flex-col lg:flex-row gap-6 lg:gap-12 p-4 lg:p-8 w-full lg:max-w-6xl mx-auto lg:min-h-[80vh] {{ $index % 2 !== 0 ? 'lg:flex-row-reverse' : '' }} animate-on-scroll"
                    data-filter="{{ $tag->id }}">

                    {{-- Image --}}
                    <div
                        class="w-full lg:w-1/2 h-auto m-auto flex rounded-full overflow-hidden border animate-on-scroll {{ $index % 2 === 0 ? 'animate-from-left' : 'animate-from-right' }}">
                        <img src="{{ asset('storage/' . $tag->image) }}" alt="{{ $tag->name ?? 'Portfolio image' }}"
                            onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}';"
                            class="w-full h-full object-cover" />
                    </div>

                    {{-- Content --}}
                    <div class="flex flex-col justify-center p-4 lg:p-8 w-full lg:w-1/2">
                        <h2 class="text-2xl lg:text-3xl font-semibold mb-4 animate-on-scroll">
                            {{ $tag->name }}
                        </h2>
                        <p class="text-gray-600 mb-4 text-base lg:text-lg animate-on-scroll">
                            {{ $tag->description }}
                        </p>

                        {{-- Action Buttons --}}
                        <div class="flex flex-wrap gap-4 mt-4 animate-on-scroll">
                            @if ($tag->external_url)
                                <a href="{{ $tag->external_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-block px-6 py-2 bg-[#f59c00] text-white rounded-full hover:bg-[#f59c00]/90 transition">
                                    {{ app()->getLocale() === 'en' ? 'View Details' : 'عرض التفاصيل' }}
                                </a>
                            @endif

                            @if ($tag->github_url)
                                <a href="{{ $tag->github_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-block px-6 py-2 text-[#f59c00] border border-[#f59c00] rounded-full hover:bg-[#f59c00]/10 transition">
                                    GitHub
                                </a>
                            @endif
                        </div>
                    </div>
                </section>
            @endforeach
        </div>

        {{-- Portfolio Filter Script --}}
        <script>
            function filterPortfolio(id) {
                document.querySelectorAll('.portfolio-card').forEach(card => {
                    const match = id === '' || card.dataset.filter === id;
                    card.style.display = match ? 'flex' : 'none';
                });
            }
        </script>


    @endguest

</x-master-layout>
