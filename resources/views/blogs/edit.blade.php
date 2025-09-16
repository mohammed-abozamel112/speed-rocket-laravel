<x-master-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Blog</h1>

        {{--    @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form action="{{ route('blogs.update', ['lang' => app()->getLocale(), 'blog' => $blog]) }}" method="POST"
            enctype="multipart/form-data" class="max-w-full p-20">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- english filed --}}
                <div class="m-4">
                    <h2 class="text-xl font-semibold mb-4">English Fields</h2>
                    <div class="mb-4">
                        <label for="title_en" class="block text-gray-700 font-bold mb-2">Title (EN)</label>
                        <input type="text" name="title_en" id="title_en"
                            value="{{ old('title_en', $blog->title_en) }}" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('title_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="short_description_en" class="block text-gray-700 font-bold mb-2">Short
                            Description (EN)</label>
                        <textarea name="short_description_en" id="short_description_en" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('short_description_en', $blog->short_description_en) }}</textarea>
                        @error('short_description_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="sub_title1_en" class="block text-gray-700 font-bold mb-2">Sub Title 1
                            (EN)</label>
                        <input type="text" name="sub_title1_en" id="sub_title1_en"
                            value="{{ old('sub_title1_en', $blog->sub_title1_en) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('sub_title1_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="sub_title2_en" class="block text-gray-700 font-bold mb-2">Sub Title 2
                            (EN)</label>
                        <input type="text" name="sub_title2_en" id="sub_title2_en"
                            value="{{ old('sub_title2_en', $blog->sub_title2_en) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('sub_title2_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="sub_title3_en" class="block text-gray-700 font-bold mb-2">Sub Title 3
                            (EN)</label>
                        <input type="text" name="sub_title3_en" id="sub_title3_en"
                            value="{{ old('sub_title3_en', $blog->sub_title3_en) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('sub_title3_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description1_en" class="block text-gray-700 font-bold mb-2">Description 1
                            (EN)</label>
                        <textarea name="description1_en" id="description1_en" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description1_en', $blog->description1_en) }}</textarea>
                        @error('description1_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description2_en" class="block text-gray-700 font-bold mb-2">Description 2
                            (EN)</label>
                        <textarea name="description2_en" id="description2_en" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description2_en', $blog->description2_en) }}</textarea>
                        @error('description2_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description3_en" class="block text-gray-700 font-bold mb-2">Description 3
                            (EN)</label>
                        <textarea name="description3_en" id="description3_en" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description3_en', $blog->description3_en) }}</textarea>
                        @error('description3_en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{-- arabic filed --}}
                <div class="m-4">
                    <h2 class="text-xl font-semibold mb-4">Arabic Fields</h2>
                    <div class="mb-4">
                        <label for="title_ar" class="block text-gray-700 font-bold mb-2">Title (AR)</label>
                        <input type="text" name="title_ar" id="title_ar"
                            value="{{ old('title_ar', $blog->title_ar) }}" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('title_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="short_description_ar" class="block text-gray-700 font-bold mb-2">Short
                            Description (AR)</label>
                        <textarea name="short_description_ar" id="short_description_ar" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('short_description_ar', $blog->short_description_ar) }}</textarea>
                        @error('short_description_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="sub_title1_ar" class="block text-gray-700 font-bold mb-2">Sub Title 1
                            (AR)</label>
                        <input type="text" name="sub_title1_ar" id="sub_title1_ar"
                            value="{{ old('sub_title1_ar', $blog->sub_title1_ar) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('sub_title1_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="sub_title2_ar" class="block text-gray-700 font-bold mb-2">Sub Title 2
                            (AR)</label>
                        <input type="text" name="sub_title2_ar" id="sub_title2_ar"
                            value="{{ old('sub_title2_ar', $blog->sub_title2_ar) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('sub_title2_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="sub_title3_ar" class="block text-gray-700 font-bold mb-2">Sub Title 3
                            (AR)</label>
                        <input type="text" name="sub_title3_ar" id="sub_title3_ar"
                            value="{{ old('sub_title3_ar', $blog->sub_title3_ar) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('sub_title3_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description1_ar" class="block text-gray-700 font-bold mb-2">Description 1
                            (AR)</label>
                        <textarea name="description1_ar" id="description1_ar" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description1_ar', $blog->description1_ar) }}</textarea>
                        @error('description1_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description2_ar" class="block text-gray-700 font-bold mb-2">Description 2
                            (AR)</label>
                        <textarea name="description2_ar" id="description2_ar" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description2_ar', $blog->description2_ar) }}</textarea>
                        @error('description2_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description3_ar" class="block text-gray-700 font-bold mb-2">Description 3
                            (AR)</label>
                        <textarea name="description3_ar" id="description3_ar" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description3_ar', $blog->description3_ar) }}</textarea>
                        @error('description3_ar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- common filed --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-bold mb-2">Author</label>

                    <select name="user_id" id="user_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" {{ old('user_id', $blog->user_id) ? '' : 'selected' }}>Select Author
                        </option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $blog->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
                    <select name="status" id="status" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft
                        </option>
                        <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>
                            Published</option>
                    </select>
                </div>
            </div>
            {{-- show preview previous image --}}
            <div class="mb-4 w-full max-h-[50vh] overflow-hidden">
                <label class="block text-gray-700 font-bold mb-2">Current Image</label>
                @if ($blog->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title_en }}"
                            class="max-w-full w-full h-auto max-h-[50%] rounded">
                    </div>
                @else
                    <p class="text-gray-500">No image uploaded.</p>
                @endif
            </div>

            <div class="flex items-center justify-center w-full py-4">
                <label for="image"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-[#f59c00]/10">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>

                    <input type="file" name="image" id="image" accept="image/*" class="hidden">
                </label>
            </div>

            {{--  <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                @if ($blog->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                            class="max-w-full h-auto rounded">
                    </div>
                @endif

            </div> --}}

            <div class="flex space-x-4 place-content-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded min-w-44">
                    Update Blog
                </button>
                <a href="{{ route('blogs.index', ['lang' => app()->getLocale()]) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-master-layout>
