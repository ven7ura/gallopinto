<x-guest-layout title="{{ $post->project}} - {{ $post->title }}">
    @seo(['description' => $post->summary])
    @seo(['type' => 'article'])
    @seo(['image' => asset('img/gp.svg')])
    @seo(['twitter.creator' => 'nicaCloud'])
    <x-common.breadcrumb>
        <li>
            <a href="{{ route('page.project.list') }}">
                Proyectos
            </a>
        </li>
        <li>
            <span class="text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        </li>
        <li>
            <a href="{{ route('page.project.detail', ['codename' => $post->codename]) }}">
                {{ $projectName }}
            </a>
        </li>
        <li>
            <span class="text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        </li>
        <li class="text-gray-500 dark:text-gray-300">{{ $post->title }}</li>
    </x-common.breadcrumb>
    <div class="flex flex-col-reverse md:flex-row max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8">
        <article
            class="prose dark:prose-invert dark:prose-p:text-gray-400 prose-pre:bg-zinc-900 prose-h1:tracking-tighter prose-h2:font-extrabold prose-h2:tracking-tighter prose-h3:font-extrabold prose-h3:tracking-tighter prose-h4:tracking-tighter prose-img:w-3/4 prose-img:mx-auto pt-4 md:prose-lg lg:prose-xl sm:flex-col-reverse line-numbers prose-blockquote:border-l-slate-700">
            {{ $post->contents }}
        </article>
    </div>
</x-guest-layout>
