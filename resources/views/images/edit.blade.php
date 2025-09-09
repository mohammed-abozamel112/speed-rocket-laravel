<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
    @endphp
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">{{ $isRtl ? 'تعديل الصورة' : 'Edit Image' }}</h1>

        <form action="{{ route('images.update', ['lang' => app()->getLocale(), 'image' => $image->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- English Fields -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">
                        {{ $isRtl ? 'معلومات الصورة (بالإنجليزية)' : 'Image Information (English)' }}</h3>

                    <div class="mb-4">
                        <label for="name_en"
                            class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'الاسم (بالإنجليزية):' : 'Name (English):' }}</label>
                        <input type="text" name="name_en" id="name_en"
                            value="{{ old('name_en', $image->name_en) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('name_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alt_text_en"
                            class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'نص بديل (بالإنجليزية):' : 'Alt Text (English):' }}</label>
                        <input type="text" name="alt_text_en" id="alt_text_en"
                            value="{{ old('alt_text_en', $image->alt_text_en) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('alt_text_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- short mg-?short_description-- --}}
                    <div class="mb-4">
                        <label for="short_description_en"
                            class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'وصف قصير (بالإنجليزية):' : 'Short Description (English):' }}</label>
                        <input type="text" name="short_description_en" id="short_description_en"
                            value="{{ old('short_description_en', $image->short_description_en) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('short_description_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="caption_en"
                            class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'التعليق (بالإنجليزية):' : 'Caption (English):' }}</label>
                        <textarea name="caption_en" id="caption_en" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('caption_en', $image->caption_en) }}</textarea>
                        @error('caption_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Arabic Fields -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">
                        {{ $isRtl ? 'معلومات الصورة (بالعربية)' : 'Image Information (Arabic)' }}</h3>

                    <div class="mb-4">
                        <label for="name_ar"
                            class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'الاسم (بالعربية):' : 'Name (Arabic):' }}</label>
                        <input type="text" name="name_ar" id="name_ar"
                            value="{{ old('name_ar', $image->name_ar) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('name_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alt_text_ar"
                            class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'نص بديل (بالعربية):' : 'Alt Text (Arabic):' }}</label>
                        <input type="text" name="alt_text_ar" id="alt_text_ar"
                            value="{{ old('alt_text_ar', $image->alt_text_ar) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('alt_text_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- short mg-?short_description-- --}}
                    <div class="mb-4">
                        <label for="short_description_ar"
                            class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'وصف قصير (بالعربية):' : 'Short Description (Arabic):' }}</label>
                        <input type="text" name="short_description_ar" id="short_description_ar"
                            value="{{ old('short_description_ar', $image->short_description_ar) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('short_description_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="caption_ar"
                            class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'التعليق (بالعربية):' : 'Caption (Arabic):' }}</label>
                        <textarea name="caption_ar" id="caption_ar" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('caption_ar', $image->caption_ar) }}</textarea>
                        @error('caption_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Common Fields -->
            <div class="mb-4">
                <label for="type_en"
                    class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'نوع الصورة:' : 'Image Type:' }}</label>
                <select name="type_en" id="type_en"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">Select Type</option>
                    <option value="blog" {{ old('type_en', $image->type_en) == 'blog' ? 'selected' : '' }}>Blog
                    </option>
                    <option value="service" {{ old('type_en', $image->type_en) == 'service' ? 'selected' : '' }}>
                        Service</option>
                    <option value="gallery" {{ old('type_en', $image->type_en) == 'gallery' ? 'selected' : '' }}>
                        Gallery</option>
                    <option value="profile" {{ old('type_en', $image->type_en) == 'profile' ? 'selected' : '' }}>
                        Profile</option>
                    <option value="client" {{ old('type_en', $image->type_en) == 'client' ? 'selected' : '' }}>Client
                    </option>
                    <option value="works" {{ old('type_en', $image->type_en) == 'works' ? 'selected' : '' }}>Works
                    </option>
                    <option value="home" {{ old('type_en', $image->type_en) == 'home' ? 'selected' : '' }}>Home
                    </option>
                    <option value="about" {{ old('type_en', $image->type_en) == 'about' ? 'selected' : '' }}>About
                    </option>
                </select>
                @if ($errors->has('type_en'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('type_en') }}</p>
                @endif
            </div>
            <div class="mb-4">
                <label for="type_ar"
                    class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'نوع الصورة:' : 'Image Type:' }}</label>
                <select name="type_ar" id="type_ar"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">Select Type</option>
                    <option value="مدونه" {{ old('type_ar', $image->type_ar) == 'مدونه' ? 'selected' : '' }}>مدونه
                    </option>
                    <option value="خدمة" {{ old('type_ar', $image->type_ar) == 'خدمة' ? 'selected' : '' }}>خدمة
                    </option>
                    <option value="معرض" {{ old('type_ar', $image->type_ar) == 'معرض' ? 'selected' : '' }}>معرض
                    </option>
                    <option value="ملف شخصي" {{ old('type_ar', $image->type_ar) == 'ملف شخصي' ? 'selected' : '' }}>ملف
                        شخصي</option>
                    <option value="عميل" {{ old('type_ar', $image->type_ar) == 'عميل' ? 'selected' : '' }}>عميل
                    </option>
                    <option value="أعمال" {{ old('type_ar', $image->type_ar) == 'أعمال' ? 'selected' : '' }}>أعمال
                    </option>
                    <option value="الرئيسية" {{ old('type_ar', $image->type_ar) == 'الرئيسية' ? 'selected' : '' }}>
                        الرئيسية</option>
                    <option value="حول" {{ old('type_ar', $image->type_ar) == 'حول' ? 'selected' : '' }}>حول
                    </option>
                </select>
                @if ($errors->has('type_ar'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('type_ar') }}</p>
                @endif
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Current Image:</label>
                <div class="bg-gray-100 rounded-lg p-4 mb-2">
                    <img src="{{ asset('storage/' . $image->path_url) }}" alt="{{ $image->alt_text }}"
                        class="w-48 h-48 object-cover rounded">
                </div>

                <label for="new_image"
                    class="block text-gray-700 font-bold mb-2 mt-4">{{ $isRtl ? 'تحميل صورة جديدة (اختياري):' : 'Upload New Image (optional):' }}</label>
                <input type="file" name="image" id="new_image"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- add dropdown for tags and services and blogs --}}
            <div class="mb-4">
                <label for="tag_id"
                    class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'التصنيف:' : 'Tag:' }}</label>
                <select name="tag_id" id="tag_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ old('tag_id', $image->tag_id) == $tag->id ? 'selected' : '' }}>{{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('tag_id'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('tag_id') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="blog_id"
                    class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'المدونة:' : 'Blog:' }}</label>
                <select name="blog_id" id="blog_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Blog</option>
                    @foreach ($blogs as $blog)
                        <option value="{{ $blog->id }}"
                            {{ old('blog_id', $image->blog_id) == $blog->id ? 'selected' : '' }}>{{ $blog->title }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('blog_id'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('blog_id') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="service_id"
                    class="block text-gray-700 font-bold mb-2">{{ $isRtl ? 'الخدمة:' : 'Service:' }}</label>
                <select name="service_id" id="service_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}"
                            {{ old('service_id', $image->service_id) == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('service_id'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('service_id') }}</p>
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ $isRtl ? 'تحديث الصورة' : 'Update Image' }}
                </button>
                <a href="{{ route('images.show', ['lang' => app()->getLocale(), 'image' => $image->id]) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </a>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeArSelect = document.getElementById('type_ar');
            const typeEnSelect = document.getElementById('type_en');

            const TypeMap = {
                //ar to en
                'مدونه': 'blog',
                'خدمة': 'service',
                'معرض': 'gallery',
                'ملف شخصي': 'profile',
                'عميل': 'client',
                'أعمال': 'works',
                'الرئيسية': 'home',
                'حول': 'about',
                //en to ar
                'blog': 'مدونه',
                'service': 'خدمة',
                'gallery': 'معرض',
                'profile': 'ملف شخصي',
                'client': 'عميل',
                'works': 'أعمال',
                'home': 'الرئيسية',
                'about': 'حول',
            };

            typeArSelect.addEventListener('change', function() {
                const selectedAr = typeArSelect.value;
                const correspondingEn = TypeMap[selectedAr];
                if (typeEnSelect.value !== correspondingEn) {
                    typeEnSelect.value = correspondingEn;
                }
            });

            typeEnSelect.addEventListener('change', function() {
                const selectedEn = typeEnSelect.value;
                const correspondingAr = TypeMap[selectedEn];
                if (typeArSelect.value !== correspondingAr) {
                    typeArSelect.value = correspondingAr;
                }
            });
        });
    </script>
</x-master-layout>
