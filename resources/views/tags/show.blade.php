<x-master-layout>
    @auth
        <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-900">{{ $tag->name }}</h1>
            <div class="flex space-x-2">
                @auth
                    <a href="{{ route('tags.edit', [$tag, 'lang' => app()->getLocale()]) }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Edit
                    </a>
                @endauth
                <a href="{{ route('tags.index', ['lang' => app()->getLocale()]) }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
                    Back to Tags
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Tag Information -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tag Details</h3>
                    <dl class="space-y-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Name (Arabic)</dt>
                            <dd class="text-sm text-gray-900">{{ $tag->name_ar ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Name (English)</dt>
                            <dd class="text-sm text-gray-900">{{ $tag->name_en ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Description</dt>
                            <dd class="text-sm text-gray-900">{{ $tag->description ?? 'No description available' }}</dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Additional Information</h3>
                    <dl class="space-y-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Created</dt>
                            <dd class="text-sm text-gray-900">{{ $tag->created_at->format('M d, Y H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Updated</dt>
                            <dd class="text-sm text-gray-900">{{ $tag->updated_at->format('M d, Y H:i') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Related Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Related Projects -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Related Projects</h3>
                @if($tag->projects->count() > 0)
                    <div class="space-y-4">
                        @foreach($tag->projects as $project)
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h4 class="font-medium text-gray-900">
                                    <a href="{{ route('projects.show', [$project, 'lang' => app()->getLocale()]) }}"
                                       class="hover:text-blue-600">
                                        {{ $project->title }}
                                    </a>
                                </h4>
                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($project->description, 100) }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 italic">No projects associated with this tag.</p>
                @endif
            </div>

            <!-- Related Blogs -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Related Blogs</h3>
                @if($tag->blog)
                    <div class="space-y-4">
                        <div class="border-l-4 border-green-500 pl-4">
                            <h4 class="font-medium text-gray-900">
                                <a href="{{ route('blogs.show', [$tag->blog, 'lang' => app()->getLocale()]) }}"
                                   class="hover:text-green-600">
                                    {{ $tag->blog->title }}
                                </a>
                            </h4>
                            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($tag->blog->short_description, 100) }}</p>
                        </div>
                    </div>
                @else
                    <p class="text-gray-500 italic">No blog posts associated with this tag.</p>
                @endif
            </div>
        </div>

        <!-- Additional Content Sections -->
        @if($tag->subtitle1 || $tag->subtitle1_description)
            <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $tag->subtitle1 ?? 'Additional Information' }}</h3>
                <p class="text-gray-700">{{ $tag->subtitle1_description ?? '' }}</p>
            </div>
        @endif

        @if($tag->subtitle2 || $tag->subtitle2_description)
            <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $tag->subtitle2 ?? 'More Details' }}</h3>
                <p class="text-gray-700">{{ $tag->subtitle2_description ?? '' }}</p>
            </div>
        @endif

        @if($tag->subtitle3 || $tag->subtitle3_description)
            <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $tag->subtitle3 ?? 'Final Notes' }}</h3>
                <p class="text-gray-700">{{ $tag->subtitle3_description ?? '' }}</p>
            </div>
        @endif
    </div>
    @endauth
    @guest
        {{-- get the current service and its tags service h-screen w-full and content in the right middle
        --}}
        <div class="flex h-screen w-full">
            <div class="m-auto">
                <h1 class="text-2xl font-bold mb-4">{{ $tag->name }}</h1>
                <p class="text-gray-700">{{ $tag->description }}</p>
            </div>
        </div>
    @endguest
</x-master-layout>
