<x-master-layout>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Review</h1>

        <form action="{{ route('reviews.update', ['lang' => app()->getLocale(), 'review' => $review->id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name_ar" class="block text-gray-700 font-bold mb-2">Name (Arabic):</label>
                <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $review->name_ar) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('name_ar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name_en" class="block text-gray-700 font-bold mb-2">Name (English):</label>
                <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $review->name_en) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('name_en')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="review_ar" class="block text-gray-700 font-bold mb-2">Review Content (Arabic):</label>
                <textarea name="review_ar" id="review_ar" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('review_ar', $review->review_ar) }}</textarea>
                @error('review_ar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="review_en" class="block text-gray-700 font-bold mb-2">Review Content (English):</label>
                <textarea name="review_en" id="review_en" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('review_en', $review->review_en) }}</textarea>
                @error('review_en')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $review->email) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="rating" class="block text-gray-700 font-bold mb-2">Rating (1-5):</label>
                <input type="number" name="rating" id="rating" value="{{ old('rating', $review->rating) }}"
                    min="1" max="5"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Current Image:</label>
                @if ($review->image)
                    <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->name }}"
                        class="w-32 h-32 object-cover mb-2 rounded">
                @else
                    <p class="text-gray-500">No image uploaded</p>
                @endif

                <label for="new_image" class="block text-gray-700 font-bold mb-2 mt-4">Upload New Image
                    (optional):</label>
                <input type="file" name="image" id="new_image"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Review
                </button>
                <a href="{{ route('reviews.show', ['lang' => app()->getLocale(), 'review' => $review->id]) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-master-layout>
