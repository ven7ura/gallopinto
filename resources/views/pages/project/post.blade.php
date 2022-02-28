<x-guest-layout title="{{ $post->project}} - {{ $post->title }}">
    <nav class="flex rounded-md mx-auto max-w-screen-lg px-2 sm:px-6 lg:px-8 my-2 sm:my-8 lg:my-12 text-xs md:text-base">
        <ol class="list-reset flex space-x-1 md:space-x-3 items-center">
            <li>
                <a href="{{ route('page.home') }}" class="text-gray-700 hover:text-gray-900 inline-flex items-center my-2 sm:my-0">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Inicio
                </a>
            </li>
            <li>
                <span class="text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </span>
            </li>
            <li>
                <a href="{{ route('page.project.list') }}" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                    Proyectos
                </a>
            </li>
            <li>
                <span class="text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </span>
            </li>
            <li>
                <a href="{{ route('page.project.detail', ['codename' => $post->codename]) }}" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                    {{ $projectName }}
                </a>
            </li>
            <li>
                <span class="text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </span>
            </li>
            <li class="text-gray-500">{{ $post->title }}</li>
        </ol>
    </nav>
    <div class="flex flex-col-reverse md:flex-row max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8">
        <article class="prose prose-pre:bg-zinc-900 prose-h1:tracking-tighter prose-h2:font-extrabold prose-h2:tracking-tighter prose-h3:font-extrabold prose-h3:tracking-tighter prose-h4:tracking-tighter pt-4 md:prose-lg lg:prose-xl sm:flex-col-reverse line-numbers">
            {{ $post->contents }}
        </article>
    </div>
</x-guest-layout>