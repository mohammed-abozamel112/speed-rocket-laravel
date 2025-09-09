<x-master-layout>

    @auth
    <div class="container mx-auto p-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('tags.create', ['lang' => app()->getLocale()]) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create New Tag
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">
                            {{ app()->getLocale() === 'en' ? 'Name' : 'الاسم' }}</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">
                            {{ app()->getLocale() === 'en' ? 'Slug' : 'الرابط' }}</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">
                            {{ app()->getLocale() === 'en' ? 'Created At' : 'تاريخ الإنشاء' }}</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $tag->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $tag->slug }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $tag->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <a href="{{ route('tags.show', ['tag' => $tag, 'lang' => app()->getLocale()]) }}"
                                    class="text-blue-600 hover:underline mr-2">View</a>
                                <a href="{{ route('tags.edit', ['tag' => $tag, 'lang' => app()->getLocale()]) }}"
                                    class="text-yellow-600 hover:underline mr-2">Edit</a>
                                <form
                                    action="{{ route('tags.destroy', ['tag' => $tag, 'lang' => app()->getLocale()]) }}"
                                    method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this tag?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 px-4 text-center text-gray-500">No tags found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $tags->links() }}
        </div>
    </div>
    @endauth

    @guest
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">{{ __('Our Tags') }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tags as $tag)
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $tag->name }}</h2>
                <p class="text-gray-600 mb-2">{{ $tag->slug }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endguest

</x-master-layout>
