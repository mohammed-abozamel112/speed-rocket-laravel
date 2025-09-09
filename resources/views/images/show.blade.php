<x-master-layout>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Image Details</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/2">
                    <div class="bg-gray-100 rounded-lg p-4 mb-4">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt_text }}"
                            class="w-full h-auto rounded-lg">
                    </div>
                </div>

                <div class="md:w-1/2">
                    <h2 class="text-xl font-semibold mb-4">Image Information</h2>

                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div>

                            <p><strong>Name:</strong> {{ $image->name }}</p>
                            <p><strong>Alt Text:</strong> {{ $image->alt_text }}</p>
                            <p><strong>Caption:</strong> {{ $image->caption }}</p>
                        </div>


                    </div>

                    <div class="mb-4">
                        <p><strong>Type:</strong> <span
                                class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">{{ $image->type }}</span>
                        </p>
                    </div>

                    <div class="text-sm text-gray-500">
                        <p><strong>Created:</strong> {{ $image->created_at->format('M d, Y H:i') }}</p>
                        <p><strong>Updated:</strong> {{ $image->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        @auth
            <div class="flex space-x-4">
                <a href="{{ route('images.edit', ['lang' => app()->getLocale(), 'image' => $image->id]) }}"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Edit Image
                </a>

                <form action="{{ route('images.destroy', ['lang' => app()->getLocale(), 'image' => $image->id]) }}"
                    method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete Image
                    </button>
                </form>

                <a href="{{ route('images.index', ['lang' => app()->getLocale()]) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Images
                </a>
            </div>
        @endauth
    </div>
</x-master-layout>
