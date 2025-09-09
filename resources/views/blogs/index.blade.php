<x-master-layout>

    @auth
        <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Blogs</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('blogs.create', ['lang' => app()->getLocale()]) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Blog
            </a>
        </div>

        @if ($blogs->count())
            <table class="min-w-full bg-white border border-gray-200 text-center">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Image</th>
                        <th class="py-2 px-4 border-b">Created At</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('blogs.show', ['lang' => app()->getLocale(), 'blog' => $blog->id]) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $blog->title }}
                                </a>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <img src="{{ asset('storage/' . $blog->image) }}" width="300px" alt="">
                            </td>
                            <td class="py-2 px-4 border-b">{{ $blog->created_at }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('blogs.edit', ['lang' => app()->getLocale(), 'blog' => $blog->id]) }}"
                                    class="text-yellow-500 hover:underline mr-2">Edit</a>
                                <form
                                    action="{{ route('blogs.destroy', ['lang' => app()->getLocale(), 'blog' => $blog->id]) }}"
                                    method="POST" class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 pagination-custom">
                {{ $blogs->links() }}
            </div>
        @else
            <p>No blogs found.</p>
        @endif
    </div>
    @endauth
    @guest
        {{-- cards grid  --}}
         <section id="blogs" class="py-20 w-full relative overflow-hidden text-[#A31621]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    {{ app()->getLocale() === 'en' ? 'Latest Blogs' : 'أحدث المدونات' }}
                </h2>
                <p class="text-xl max-w-2xl mx-auto leading-relaxed text-gray-300">
                    {{ app()->getLocale() === 'en' ? 'Check out our latest blog posts and updates.' : 'اطلع على أحدث منشورات المدونة والتحديثات.' }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($blogs as $post)
                    <div
                        class="bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer relative min-h-[20rem] ">
                        @if ($post->tags->isNotEmpty())
                            <div class="flex absolute z-50 top-2 gap-2 px-3">
                                @foreach ($post->tags as $tag)
                                    <span
                                        class="bg-[#A31621] hover:bg-red-700 text-white px-2 py-2 rounded-full text-[.5rem] font-medium transition-all duration-200 hover:shadow-xl hover:-translate-y-1 group">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <span
                                class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full inline-block whitespace-nowrap absolute z-50 top-2">
                                {{ app()->getLocale() === 'en' ? 'general' : 'عام' }}
                            </span>
                        @endif
                        <a class="w-full h-full"
                            href="{{ route('blogs.show', ['lang' => app()->getLocale(), 'blog' => $post->id]) }}">
                            @if ($post->image)
                                <img loading="lazy"
                                    src="{{ $post->image ? $post->image : asset('storage/' . $post->image) }}"
                                    onerror="this.onerror=null; this.src='{{ asset('storage/main.png') }}'"
                                    alt="{{ $post->title }}" class="w-full h-full object-cover hover:blur-sm" />
                            @endif
                            <div class="p-6 absolute bottom-0">
                                <h3 class="text-2xl font-bold mb-2">{{ $post->title }}</h3>
                                <p class="text-gray-300 mb-4">
                                    {{ Str::limit($post->short_description, 150) }}</p>
                                <a href="{{ route('blogs.show', ['lang' => app()->getLocale(), 'blog' => $post->id]) }}"
                                    class="bg-[#A31621] hover:bg-red-700 text-white px-8 py-3 rounded-full text-lg font-medium transition-all duration-200 hover:shadow-xl hover:-translate-y-1 group">{{ app()->getLocale() === 'en' ? 'Read More' : 'اعرف المزيد' }}</a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($blogs->hasPages())
                <div class="mt-8 flex justify-center">
                    {{ $blogs->withQueryString()->links() }}
                </div>
            @endif

        </div>
    </section>
    @endguest
</x-master-layout>
