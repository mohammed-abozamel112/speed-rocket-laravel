<x-master-layout>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Reviews</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('reviews.create', ['lang' => app()->getLocale()]) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Review
            </a>
        </div>

        @if ($reviews->count())
            <table class="min-w-full bg-white border border-gray-200 text-center">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Name (English)</th>
                        <th class="py-2 px-4 border-b">Name (Arabic)</th>
                        <th class="py-2 px-4 border-b">Rating</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Image</th>
                        <th class="py-2 px-4 border-b">Created At</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('reviews.show', ['lang' => app()->getLocale(), 'review' => $review]) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $review->name_en }}
                                </a>
                            </td>
                            <td class="py-2 px-4 border-b text-right" dir="rtl">{{ $review->name_ar }}</td>
                            <td class="py-2 px-4 border-b">{{ $review->rating }}/5</td>
                            <td class="py-2 px-4 border-b">{{ $review->email ?? 'N/A' }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($review->image)
                                    <img src="{{ asset('storage/' . $review->image) }}" width="100px" alt="{{ $review->name_en }}">
                                @else
                                    No image
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">{{ $review->created_at }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('reviews.edit', ['lang' => app()->getLocale(), 'review' => $review]) }}"
                                    class="text-yellow-500 hover:underline mr-2">Edit</a>
                                <form
                                    action="{{ route('reviews.destroy', ['lang' => app()->getLocale(), 'review' => $review]) }}"
                                    method="POST" class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $reviews->links() }}
            </div>
        @else
            <p>No reviews found.</p>
        @endif
    </div>
</x-master-layout>
