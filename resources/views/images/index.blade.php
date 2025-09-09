<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';

    @endphp
    @auth
        <div class="container mx-auto px-4">
            {{-- <h1 class="text-2xl font-bold mb-4">Images</h1> --}}

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif


            <div class="mb-4">
                <a href="{{ route('images.create', ['lang' => app()->getLocale()]) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Upload New Image
                </a>
            </div>


            @if ($images->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($images as $image)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="h-48 overflow-hidden">
                                {{-- if it is like this main.png use $imageSrc if has full link use $imageLink --}}
                                <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt_text }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg mb-2">{{ $image->name }}</h3>
                                <p class="text-gray-600 text-sm mb-2">{{ $image->caption }}</p>
                                <p class="text-gray-500 text-xs mb-3">{{ $image->type }}</p>



                                <div class="flex space-x-2">
                                    <a href="{{ route('images.show', ['lang' => app()->getLocale(), 'image' => $image]) }}"
                                        class="text-blue-600 hover:underline text-sm">View</a>
                                    <a href="{{ route('images.edit', ['lang' => app()->getLocale(), 'image' => $image]) }}"
                                        class="text-yellow-600 hover:underline text-sm">Edit</a>
                                    <form
                                        action="{{ route('images.destroy', ['lang' => app()->getLocale(), 'image' => $image]) }}"
                                        method="POST" class="inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this image?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $images->links() }}
                </div>
            @else
                <p class="text-gray-500">No images found.</p>
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
                @foreach ($sliderImages as $slider)
                    <div class="slide relative flex-auto bg-cover bg-center transition-all duration-500 ease-in-out hover:flex-grow group"
                        style="background-image:url('{{ asset('storage/' . $slider->image) }}')">

                        <div
                            class="w-full absolute inset-y-0 left-0 flex md:items-center justify-center md:justify-start items-end pointer-events-none p-4
                            transition-opacity duration-300 group-hover:opacity-0">
                            <h2 class="text-[#a31621] text-8xl font-bold vertical-text py-2">{{ $slider->name }}</h2>
                        </div>

                        <div
                            class="absolute {{ $isRtl ? 'bottom-0 right-0' : 'bottom-0 left-0' }} inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h2 class="text-[#A31621] text-6xl font-bold leading-normal">{{ $slider->name }}</h2>
                            <p class="text-white">{{ $slider->caption }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div
            class="container m-auto mb-8 p-4 flex flex-grow flex-col items-center justify-center w-full min-w-full min-h-[25vh] bg-[#a3162223]">
            <h1 class="text-6xl text-[#A31621] font-bold m-4 ">{{ $isRtl ? 'معرض الصور' : 'Image Gallery' }}</h1>
            <p class="text-gray-500">
                {{ $isRtl ? 'تعتبر مجموعتنا احتفالًا بالإبداع وشهادة على قوة الفن.' : 'Our collection is a celebration of creativity and a testament to the power of art.' }}
            </p>
        </div>
        <div class="mb-8">
            <div class="flex flex-wrap gap-2 w-full justify-center">
                <button
                    class="px-4 py-2 rounded-full bg-[#A31621]/10 text-[#A31621] text-sm font-medium hover:bg-[#A31621]/20 transition"
                    onclick="filterimages('')">
                    {{ app()->getLocale() === 'en' ? 'All' : 'الكل' }}
                </button>
                @foreach ($images->pluck('type')->unique() as $type)
                    <button
                        class="px-4 py-2 rounded-full bg-[#A31621]/10 text-[#A31621] text-sm font-medium hover:bg-[#A31621]/20 transition"
                        data-filter="{{ $type }}" onclick="filterimages('{{ $type }}')">
                        {{ $type }}
                    </button>
                @endforeach
            </div>
        </div>
        {{-- images as card and create slider with 3 images and add link to open the image --}}
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 min-w-[100%] md:min-w-[80%] max-w-[100%] md:max-w-[80%]">
            @foreach ($images as $image)
                @php
                    $type = $image->type;
                @endphp
                <div class="bg-white rounded-lg shadow-md overflow-hidden image-filter" data-filter="{{ $type }}">
                    <div class="min-h-80 overflow-hidden">
                        <img loading="lazy" src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt_text }}" onerror="this.onerror=null;this.src='{{ asset('storage/main.png') }}';"
                            class="object-cover aspect-square">
                    </div>
                  
                </div>
            @endforeach
        </div>
        <script>
            function filterimages(type) {
                document.querySelectorAll('.image-filter').forEach(function(card) {
                    if (type === '' || card.getAttribute('data-filter') === type) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        </script>
    @endguest

</x-master-layout>
