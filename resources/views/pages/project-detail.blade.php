<x-guest-layout title="Proyecto - {{ $projectName }}">
    <div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8">
        <div class="prose pt-4">
            <h1>{{ $projectName }}</h1>
        </div>
        <ol>
        @foreach ($projects as $project)
            <li>{{ $project->title }}</li>
        @endforeach
        </ol>
    </div>
</x-guest-layout>