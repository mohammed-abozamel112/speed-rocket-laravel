<x-master-layout>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Review Details</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-6">
                @if($review->image)
                    <div class="md:w-1/3">
                        <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->name }}" class="w-full h-auto rounded-lg">
                    </div>
                @endif

                <div class="md:w-2/3">
                    <h2 class="text-xl font-semibold mb-2">{{ $review->name_en }}</h2>
                    <h3 class="text-lg font-medium mb-2 text-right" dir="rtl">{{ $review->name_ar }}</h3>

                    <div class="flex items-center mb-4">
                        <span class="text-yellow-500 text-lg mr-2">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                        </span>
                        <span class="text-gray-600">({{ $review->rating }}/5)</span>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold mb-1">Review (English):</h4>
                        <p class="text-gray-700">{{ $review->review_en }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold mb-1 text-right" dir="rtl">التقييم (العربية):</h4>
                        <p class="text-gray-700 text-right" dir="rtl">{{ $review->review_ar }}</p>
                    </div>

                    @if($review->email)
                        <div class="mb-4">
                            <h4 class="font-semibold mb-1">Email:</h4>
                            <p class="text-gray-700">{{ $review->email }}</p>
                        </div>
                    @endif

                    <div class="text-sm text-gray-500">
                        <p>Created: {{ $review->created_at->format('M d, Y') }}</p>
                        <p>Updated: {{ $review->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('reviews.edit', ['lang' => app()->getLocale(), 'review' => $review->id]) }}"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit Review
            </a>

            <form action="{{ route('reviews.destroy', ['lang' => app()->getLocale(), 'review' => $review->id]) }}"
                method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete Review
                </button>
            </form>

            <a href="{{ route('reviews.index', ['lang' => app()->getLocale()]) }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Reviews
            </a>
        </div>
    </div>
</x-master-layout>
