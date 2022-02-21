<x-guest-layout title="{{ $project->title }}">
    <div class="flex flex-col-reverse md:flex-row max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8">
        <article class="prose prose-pre:bg-zinc-900 pt-4 md:prose-lg lg:prose-xl sm:flex-col-reverse line-numbers">
            {{ $project->contents }}
        </article>
    </div>
</x-guest-layout>