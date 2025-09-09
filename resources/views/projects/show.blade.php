<x-master-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $project->title }}</h1>
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover mb-4">
            <p class="text-gray-600 mb-4">{{ $project->description }}</p>
            <p class="text-gray-600 mb-4"><strong>Category:</strong> {{ $project->category }}</p>
            <p class="text-gray-600 mb-4"><strong>External URL:</strong> <a href="{{ $project->external_url }}" class="text-blue-500">{{ $project->external_url }}</a></p>
            <p class="text-gray-600 mb-4"><strong>GitHub URL:</strong> <a href="{{ $project->github_url }}" class="text-blue-500">{{ $project->github_url }}</a></p>
            <div class="flex justify-between">
                <a href="{{ route('projects.edit', ['lang' => app()->getLocale(), 'project' => $project]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <a href="{{ route('projects.index', app()->getLocale()) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Projects</a>
            </div>
        </div>
    </div>
</x-master-layout>
