<x-master-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Project</h1>

            <form action="{{ route('projects.update', ['lang' => app()->getLocale(), 'project' => $project]) }}" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title_ar">
                        Title Arabic
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title_ar') border-red-500 @enderror"
                        id="title_ar" type="text" name="title_ar" value="{{ old('title_ar', $project->title_ar) }}" required>
                    @error('title_ar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title_en">
                        Title English
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title_en') border-red-500 @enderror"
                        id="title_en" type="text" name="title_en" value="{{ old('title_en', $project->title_en) }}" required>
                    @error('title_en')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description_ar">
                        Description Arabic
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description_ar') border-red-500 @enderror"
                        id="description_ar" name="description_ar" rows="4" required>{{ old('description_ar', $project->description_ar) }}</textarea>
                    @error('description_ar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description_en">
                        Description English
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description_en') border-red-500 @enderror"
                        id="description_en" name="description_en" rows="4" required>{{ old('description_en', $project->description_en) }}</textarea>
                    @error('description_en')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_ar">
                        Category Arabic
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category_ar') border-red-500 @enderror"
                        id="category_ar" type="text" name="category_ar" value="{{ old('category_ar', $project->category_ar) }}">
                    @error('category_ar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_en">
                        Category English
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category_en') border-red-500 @enderror"
                        id="category_en" type="text" name="category_en" value="{{ old('category_en', $project->category_en) }}">
                    @error('category_en')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="external_url">
                        External URL
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('external_url') border-red-500 @enderror"
                        id="external_url" type="url" name="external_url" value="{{ old('external_url', $project->external_url) }}">
                    @error('external_url')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="github_url">
                        GitHub URL
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('github_url') border-red-500 @enderror"
                        id="github_url" type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}">
                    @error('github_url')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                        Project Image
                    </label>
                    @if ($project->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" class="w-32 h-32 object-cover">
                        </div>
                    @endif
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror"
                        id="image" type="file" name="image">
                    @error('image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Update Project
                    </button>
                    <a href="{{ route('projects.index', app()->getLocale()) }}"
                        class="text-gray-500 hover:text-gray-700">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>
