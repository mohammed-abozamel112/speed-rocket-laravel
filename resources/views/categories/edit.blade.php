<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
        $labelAlign = $isRtl ? 'text-right' : 'text-left';
        $inputAlign = $isRtl ? 'text-right' : 'text-left';
        $flexDir = $isRtl ? 'flex-row-reverse' : 'flex-row';
        $bgClass = $isRtl ? 'bg-left' : 'bg-right';
    @endphp
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $isRtl ? 'تعديل الفئة' : 'Edit Category' }}</h1>

            <form action="{{ route('categories.update', ['category' => $category, 'lang' => app()->getLocale()]) }}"
                method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name_en">
                        Name (English)
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name_en') border-red-500 @enderror"
                        id="name_en" type="text" name="name_en" value="{{ old('name_en', $category->name_en) }}"
                        required>
                    @error('name_en')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name_ar">
                        Name (Arabic)
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name_ar') border-red-500 @enderror"
                        id="name_ar" type="text" name="name_ar" value="{{ old('name_ar', $category->name_ar) }}"
                        required>
                    @error('name_ar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description_en">
                        Description (English)
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description_en') border-red-500 @enderror"
                        id="description_en" name="description_en" rows="3">{{ old('description_en', $category->description_en) }}</textarea>
                    @error('description_en')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description_ar">
                        Description (Arabic)
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description_ar') border-red-500 @enderror"
                        id="description_ar" name="description_ar" rows="3">{{ old('description_ar', $category->description_ar) }}</textarea>
                    @error('description_ar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="service_id">
                        Service
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('service_id') border-red-500 @enderror {{ $bgClass }}"
                        id="service_id" name="service_id">
                        <option value="">Select Service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}"
                                {{ old('service_id', $category->service_id) == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Update Category
                    </button>
                    <a href="{{ route('categories.index', app()->getLocale()) }}"
                        class="text-gray-500 hover:text-gray-700">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>
