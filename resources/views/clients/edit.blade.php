<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
        $textAlign = $isRtl ? 'text-right' : 'text-left';
        $flexDirection = $isRtl ? 'flex-row-reverse' : 'flex-row';
    @endphp

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 {{ $textAlign }}">
                {{ $isRtl ? 'تعديل العميل' : 'Edit Client' }}
            </h1>

            <form action="{{ route('clients.update', ['lang' => app()->getLocale(), 'client' => $client]) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- English Fields -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 {{ $textAlign }}">
                            {{ $isRtl ? 'المعلومات باللغة الإنجليزية' : 'English Information' }}
                        </h3>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}" for="name_en">
                                {{ $isRtl ? 'الاسم (الإنجليزية)' : 'Name (English)' }}
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name_en') border-red-500 @enderror"
                                   id="name_en"
                                   type="text"
                                   name="name_en"
                                   value="{{ old('name_en', $client->name_en) }}"
                                   required>
                            @error('name_en')
                                <p class="text-red-500 text-xs italic {{ $textAlign }}">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}" for="description_en">
                                {{ $isRtl ? 'الوصف (الإنجليزية)' : 'Description (English)' }}
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description_en') border-red-500 @enderror"
                                      id="description_en"
                                      name="description_en"
                                      rows="3">{{ old('description_en', $client->description_en) }}</textarea>
                            @error('description_en')
                                <p class="text-red-500 text-xs italic {{ $textAlign }}">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}" for="category_en">
                                {{ $isRtl ? 'الفئة (الإنجليزية)' : 'Category (English)' }}
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category_en') border-red-500 @enderror"
                                   id="category_en"
                                   type="text"
                                   name="category_en"
                                   value="{{ old('category_en', $client->category_en) }}">
                            @error('category_en')
                                <p class="text-red-500 text-xs italic {{ $textAlign }}">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Arabic Fields -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 {{ $textAlign }}">
                            {{ $isRtl ? 'المعلومات باللغة العربية' : 'Arabic Information' }}
                        </h3>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}" for="name_ar">
                                {{ $isRtl ? 'الاسم (العربية)' : 'Name (Arabic)' }}
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name_ar') border-red-500 @enderror"
                                   id="name_ar"
                                   type="text"
                                   name="name_ar"
                                   value="{{ old('name_ar', $client->name_ar) }}"
                                   required>
                            @error('name_ar')
                                <p class="text-red-500 text-xs italic {{ $textAlign }}">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}" for="description_ar">
                                {{ $isRtl ? 'الوصف (العربية)' : 'Description (Arabic)' }}
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description_ar') border-red-500 @enderror"
                                      id="description_ar"
                                      name="description_ar"
                                      rows="3">{{ old('description_ar', $client->description_ar) }}</textarea>
                            @error('description_ar')
                                <p class="text-red-500 text-xs italic {{ $textAlign }}">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}" for="category_ar">
                                {{ $isRtl ? 'الفئة (العربية)' : 'Category (Arabic)' }}
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category_ar') border-red-500 @enderror"
                                   id="category_ar"
                                   type="text"
                                   name="category_ar"
                                   value="{{ old('category_ar', $client->category_ar) }}">
                            @error('category_ar')
                                <p class="text-red-500 text-xs italic {{ $textAlign }}">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Common Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}" for="image">
                            {{ $isRtl ? 'الصورة' : 'Image' }}
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror"
                               id="image"
                               type="file"
                               name="image"
                               accept="image/*">
                        @error('image')
                            <p class="text-red-500 text-xs italic {{ $textAlign }}">{{ $message }}</p>
                        @enderror
                        @if($client->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $client->image) }}" alt="Current image" class="w-20 h-20 object-cover rounded">
                            </div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}" for="status">
                            {{ $isRtl ? 'الحالة' : 'Status' }}
                        </label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror"
                                id="status"
                                name="status">
                            <option value="1" {{ old('status', $client->status) == 1 ? 'selected' : '' }}>{{ $isRtl ? 'نشط' : 'Active' }}</option>
                            <option value="0" {{ old('status', $client->status) == 0 ? 'selected' : '' }}>{{ $isRtl ? 'غير نشط' : 'Inactive' }}</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic {{ $textAlign }}">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6 {{ $flexDirection }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        {{ $isRtl ? 'تحديث العميل' : 'Update Client' }}
                    </button>
                    <a href="{{ route('clients.index', ['lang' => app()->getLocale()]) }}" class="text-gray-500 hover:text-gray-700">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>
