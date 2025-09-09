<x-master-layout>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Tag</h1>

        <form action="{{ route('tags.update', ['lang' => app()->getLocale(), 'tag' => $tag->id]) }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name_ar" class="block text-sm font-medium text-gray-700 mb-2">Tag Name (Arabic)</label>
                <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $tag->name_ar) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name_ar')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name_en" class="block text-sm font-medium text-gray-700 mb-2">Tag Name (English)</label>
                <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $tag->name_en) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name_en')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description_ar" class="block text-sm font-medium text-gray-700 mb-2">Description (Arabic)</label>
                <textarea name="description_ar" id="description_ar" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description_ar', $tag->description_ar) }}</textarea>
                @error('description_ar')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description_en" class="block text-sm font-medium text-gray-700 mb-2">Description (English)</label>
                <textarea name="description_en" id="description_en" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description_en', $tag->description_en) }}</textarea>
                @error('description_en')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL</label>
                <input type="url" name="url" id="url" value="{{ old('url', $tag->url) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('url')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('tags.index', ['lang' => app()->getLocale()]) }}"
                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Tag
                </button>
            </div>
        </form>
    </div>
</div>
</x-master-layout>
