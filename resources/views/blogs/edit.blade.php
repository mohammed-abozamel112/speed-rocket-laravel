<x-master-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Blog</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.update', ['lang' => app()->getLocale(), 'blog' => $blog]) }}" method="POST"
            enctype="multipart/form-data" class="max-w-4xl">
            @csrf
            @method('PUT')

            @foreach (['ar', 'en'] as $lang)
                <div class="mb-4">
                    <label for="title_{{ $lang }}" class="block text-gray-700 font-bold mb-2">Title
                        ({{ strtoupper($lang) }})</label>
                    <input type="text" name="title_{{ $lang }}" id="title_{{ $lang }}"
                        value="{{ old('title_' . $lang, $blog->{'title_' . $lang}) }}" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="short_description_{{ $lang }}" class="block text-gray-700 font-bold mb-2">Short
                        Description ({{ strtoupper($lang) }})</label>
                    <textarea name="short_description_{{ $lang }}" id="short_description_{{ $lang }}" rows="3"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('short_description_' . $lang, $blog->{'short_description_' . $lang}) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="sub_title1_{{ $lang }}" class="block text-gray-700 font-bold mb-2">Sub Title 1
                        ({{ strtoupper($lang) }})</label>
                    <input type="text" name="sub_title1_{{ $lang }}" id="sub_title1_{{ $lang }}"
                        value="{{ old('sub_title1_' . $lang, $blog->{'sub_title1_' . $lang}) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="sub_title2_{{ $lang }}" class="block text-gray-700 font-bold mb-2">Sub Title 2
                        ({{ strtoupper($lang) }})</label>
                    <input type="text" name="sub_title2_{{ $lang }}" id="sub_title2_{{ $lang }}"
                        value="{{ old('sub_title2_' . $lang, $blog->{'sub_title2_' . $lang}) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="sub_title3_{{ $lang }}" class="block text-gray-700 font-bold mb-2">Sub Title 3
                        ({{ strtoupper($lang) }})</label>
                    <input type="text" name="sub_title3_{{ $lang }}" id="sub_title3_{{ $lang }}"
                        value="{{ old('sub_title3_' . $lang, $blog->{'sub_title3_' . $lang}) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="description1_{{ $lang }}"
                        class="block text-gray-700 font-bold mb-2">Description 1 ({{ strtoupper($lang) }})</label>
                    <textarea name="description1_{{ $lang }}" id="description1_{{ $lang }}" rows="3"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description1_' . $lang, $blog->{'description1_' . $lang}) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="description2_{{ $lang }}"
                        class="block text-gray-700 font-bold mb-2">Description 2 ({{ strtoupper($lang) }})</label>
                    <textarea name="description2_{{ $lang }}" id="description2_{{ $lang }}" rows="3"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description2_' . $lang, $blog->{'description2_' . $lang}) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="description3_{{ $lang }}"
                        class="block text-gray-700 font-bold mb-2">Description 3 ({{ strtoupper($lang) }})</label>
                    <textarea name="description3_{{ $lang }}" id="description3_{{ $lang }}" rows="3"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description3_' . $lang, $blog->{'description3_' . $lang}) }}</textarea>
                </div>
            @endforeach

            <div class="mb-4">
                <label for="user_id" class="block text-gray-700 font-bold mb-2">Author</label>

                <select name="user_id" id="user_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" {{ old('user_id', $blog->user_id) ? '' : 'selected' }}>Select Author
                    </option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('user_id', $blog->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
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

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                @if ($blog->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                            class="max-w-full h-auto rounded">
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
