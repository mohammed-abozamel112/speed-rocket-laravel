<x-master-layout>

    @auth
        <div class="container mx-auto p-4">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('services.create', ['lang' => app()->getLocale()]) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create New Service
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">
                                {{ app()->getLocale() === 'en' ? 'Name' : 'الاسم' }}</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">
                                {{ app()->getLocale() === 'en' ? 'Short Description' : 'وصف مختصر' }}</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">
                                {{ app()->getLocale() === 'en' ? 'Price' : 'السعر' }}</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">
                                {{ app()->getLocale() === 'en' ? 'Statue' : 'الحالة' }}</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">
                                {{ app()->getLocale() === 'en' ? 'Image' : 'الصورة' }}</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $service->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $service->short_description }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">${{ number_format($service->price, 2) }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    @if ($service->status)
                                        <span class="text-green-600 font-semibold">'Active</span>
                                    @else
                                        <span class="text-red-600 font-semibold">Inactive</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    @if ($service->image)
                                        <img onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                                            src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"
                                            class="w-16 h-16 object-cover">
                                    @else
                                        <span class="text-gray-500">No Image</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <a href="{{ route('services.show', ['service' => $service, 'lang' => app()->getLocale()]) }}"
                                        class="text-blue-600 hover:underline mr-2">View</a>
                                    <a href="{{ route('services.edit', ['service' => $service, 'lang' => app()->getLocale()]) }}"
                                        class="text-yellow-600 hover:underline mr-2">Edit</a>
                                    <form
                                        action="{{ route('services.destroy', ['service' => $service, 'lang' => app()->getLocale()]) }}"
                                        method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 px-4 text-center text-gray-500">No services found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $services->links() }}
            </div>
        </div>
    @endauth

    @guest
        <section class="w-full min-h-screen flex flex-col justify-center items-center"
            style="background: url('{{ asset('storage/servicesmain.png') }}'); background-size: cover; background-position: center;">
            <h1 class="text-3xl font-bold mb-6">{{ __('Our Services') }}</h1>
            <p class="text-lg text-center">{{ __('Explore our range of services tailored to your needs.') }}</p>


        </section>
        {{--  create a filter of services to show only their tags  --}}
        {{-- Filter Buttons --}}
        <div class="mb-8">
            <div class="flex flex-wrap gap-2 w-full justify-center">
                {{-- All Services Button --}}
                <button type="button" data-filter="all"
                    class="filter-btn px-4 py-2 rounded-full {{ !request()->has('filter') ? 'bg-[#A31621] text-white' : 'bg-[#A31621]/10 text-[#A31621]' }} text-sm font-medium hover:bg-[#A31621]/20 transition">
                    {{ app()->getLocale() === 'en' ? 'All' : 'الكل' }}
                </button>

                {{-- Service Filter Buttons --}}
                @foreach ($services as $service)
                    <button type="button" data-filter="{{ $service->id }}"
                        class="filter-btn px-4 py-2 rounded-full {{ request('filter') == $service->id ? 'bg-[#A31621] text-white' : 'bg-[#A31621]/10 text-[#A31621]' }} text-sm font-medium hover:bg-[#A31621]/20 transition">
                        {{ $service->name }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Loading Spinner --}}
        <div id="loading-spinner" class="hidden flex justify-center items-center py-8">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#A31621]"></div>
        </div>

        {{-- Filtered Tags Display --}}
        <div id="tags-container">
            @include('services.partials.tags')
        </div>


    @endguest

</x-master-layout>
