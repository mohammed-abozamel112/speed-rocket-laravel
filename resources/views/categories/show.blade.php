<x-master-layout>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Category Details</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">{{ $category->name }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <h3 class="font-semibold text-gray-700 mb-2">English Information:</h3>
                    <p><strong>Name:</strong> {{ $category->name_en }}</p>
                    <p><strong>Description:</strong> {{ $category->description_en }}</p>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-700 mb-2">Arabic Information:</h3>
                    <p><strong>Name:</strong> {{ $category->name_ar }}</p>
                    <p><strong>Description:</strong> {{ $category->description_ar }}</p>
                </div>
            </div>

            <div class="mb-4">
                <h3 class="font-semibold text-gray-700 mb-2">Relationships:</h3>
                @if($category->service)
                    <p><strong>Service:</strong> {{ $category->service->name }}</p>
                @endif
                @if($category->blog)
                    <p><strong>Blog:</strong> {{ $category->blog->title }}</p>
                @endif
            </div>

            <div class="text-sm text-gray-500">
                <p><strong>Created:</strong> {{ $category->created_at->format('M d, Y H:i') }}</p>
                <p><strong>Updated:</strong> {{ $category->updated_at->format('M d, Y H:i') }}</p>
            </div>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('categories.edit', ['lang' => app()->getLocale(), 'category' => $category->id]) }}"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit Category
            </a>

            <form action="{{ route('categories.destroy', ['lang' => app()->getLocale(), 'category' => $category->id]) }}"
                method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete Category
                </button>
            </form>

            <a href="{{ route('categories.index', ['lang' => app()->getLocale()]) }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Categories
            </a>
        </div>
    </div>
</x-master-layout>
