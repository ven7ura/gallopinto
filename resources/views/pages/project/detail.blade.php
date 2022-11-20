<x-guest-layout title="Proyecto - {{ $projectName }}">
    @seo(['description' => "Detalles y capitulos del proyecto: {$projectName}"])
    @seo(['image' => asset('img/gp.svg')])
    @seo(['twitter.creator' => 'nicaCloud'])
    <x-common.breadcrumb>
        <li>
            <a href="{{ route('page.project.list') }}"
                class="text-gray-700 hover:text-gray-900 inline-flex items-center">
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
        <li class="text-gray-500 dark:text-gray-300">{{ $projectName }}</li>
    </x-common.breadcrumb>
    <div>
        <div
            class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 prose dark:prose-invert prose-h1:tracking-tighter my-4 sm:my-12 lg:my-16">
            <h1>{{ $projectName }}</h1>
        </div>
        <div class="bg-white dark:bg-slate-800 shadow-lg py-4 my-4 sm:my-6 lg:my-8">
            <div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 py-16 space-y-12">
                @foreach ($posts as $post)
                <article class="relative flex flex-col max-w-3xl lg:ml-auto lg:max-w-none lg:w-[50rem]">
                    <h3 class="text-xl tracking-tight font-bold">
                        <a class="underline dark:text-white dark:hover:text-orange-300"
                            href="{{ route('page.project.post', ['codename' => $post->codename, 'chapter' => $post->chapter]) }}">{{
                            $post->title }}</a>
                    </h3>
                    <p class="prose lg:prose-lg text-gray-500 dark:text-gray-400">
                        {{ $post->summary }}
                    </p>
                    <div
                        class="text-gray-500 dark:text-gray-300 text-sm mt-auto flex flex-row-reverse items-center justify-end">
                        <dl>
                            <dt class="sr-only">Capitulos</dt>
                            <dd
                                class="text-sm leading-7 lg:absolute lg:top-0 lg:right-full sm:mr-8 lg:whitespace-nowrap">
                                Capitulo {{ $post->order }}
                            </dd>
                        </dl>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</x-guest-layout>
