<x-master-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Blog
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6 max-w-4xl">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.store', ['lang' => app()->getLocale()]) }}" method="POST"
            enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title_ar" class="block text-sm font-medium text-gray-700">Title (Arabic) *</label>
                <input type="text" name="title_ar" id="title_ar" value="{{ old('title_ar') }}" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>

            <div>
                <label for="title_en" class="block text-sm font-medium text-gray-700">Title (English) *</label>
                <input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>

            <div>
                <label for="short_description_ar" class="block text-sm font-medium text-gray-700">Short Description
                    (Arabic)
                    *</label>
                <textarea name="short_description_ar" id="short_description_ar" rows="3" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('short_description_ar') }}</textarea>
            </div>

            <div>
                <label for="short_description_en" class="block text-sm font-medium text-gray-700">Short Description
                    (English) *</label>
                <textarea name="short_description_en" id="short_description_en" rows="3" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('short_description_en') }}</textarea>
            </div>

            <div>
                <label for="sub_title1_ar" class="block text-sm font-medium text-gray-700">Sub Title 1
                    (Arabic)</label>
                <input type="text" name="sub_title1_ar" id="sub_title1_ar" value="{{ old('sub_title1_ar') }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>

            <div>
                <label for="sub_title1_en" class="block text-sm font-medium text-gray-700">Sub Title 1
                    (English)</label>
                <input type="text" name="sub_title1_en" id="sub_title1_en" value="{{ old('sub_title1_en') }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>

            <div>
                <label for="sub_title2_ar" class="block text-sm font-medium text-gray-700">Sub Title 2
                    (Arabic)</label>
                <input type="text" name="sub_title2_ar" id="sub_title2_ar" value="{{ old('sub_title2_ar') }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>

            <div>
                <label for="sub_title2_en" class="block text-sm font-medium text-gray-700">Sub Title 2
                    (English)</label>
                <input type="text" name="sub_title2_en" id="sub_title2_en" value="{{ old('sub_title2_en') }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>

            <div>
                <label for="sub_title3_ar" class="block text-sm font-medium text-gray-700">Sub Title 3
                    (Arabic)</label>
                <input type="text" name="sub_title3_ar" id="sub_title3_ar" value="{{ old('sub_title3_ar') }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>

            <div>
                <label for="sub_title3_en" class="block text-sm font-medium text-gray-700">Sub Title 3
                    (English)</label>
                <input type="text" name="sub_title3_en" id="sub_title3_en" value="{{ old('sub_title3_en') }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>

            <div>
                <label for="description1_ar" class="block text-sm font-medium text-gray-700">Description 1
                    (Arabic)</label>
                <textarea name="description1_ar" id="description1_ar" rows="4"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description1_ar') }}</textarea>
            </div>

            <div>
                <label for="description1_en" class="block text-sm font-medium text-gray-700">Description 1
                    (English)</label>
                <textarea name="description1_en" id="description1_en" rows="4"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description1_en') }}</textarea>
            </div>

            <div>
                <label for="description2_ar" class="block text-sm font-medium text-gray-700">Description 2
                    (Arabic)</label>
                <textarea name="description2_ar" id="description2_ar" rows="4"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description2_ar') }}</textarea>
            </div>

            <div>
                <label for="description2_en" class="block text-sm font-medium text-gray-700">Description 2
                    (English)</label>
                <textarea name="description2_en" id="description2_en" rows="4"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description2_en') }}</textarea>
            </div>

            <div>
                <label for="description3_ar" class="block text-sm font-medium text-gray-700">Description 3
                    (Arabic)</label>
                <textarea name="description3_ar" id="description3_ar" rows="4"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description3_ar') }}</textarea>
            </div>

            <div>
                <label for="description3_en" class="block text-sm font-medium text-gray-700">Description 3
                    (English)</label>
                <textarea name="description3_en" id="description3_en" rows="4"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description3_en') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>
            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">Author</label>
                <select name="user_id" id="user_id"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="" {{ old('user_id') ? '' : 'selected' }}>Select Author</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            {{--  <div class="mb-4">
                <label for="user_id" class="block text-gray-700 font-bold mb-2">Author</label>

                <select name="user_id" id="user_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" {{ old('user_id', 'user_id') ? '' : 'selected' }}>Select Author
                    </option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('user_id', $blog->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                <select name="status" id="status" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>


            <div class="flex space-x-4 pt-4">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Blog
                </button>
                <a href="{{ route('blogs.index', ['lang' => app()->getLocale()]) }}"
                    class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-master-layout>
