<x-guest-layout title="Entradas del blog - Mes de {{ $monthName }} del {{ $year }}">
    <x-common.breadcrumb>
        <li>
            <a href="{{ route('page.blog.yearly', ['year' => $year]) }}">
                {{ $year }}
            </a>
        </li>
        <li>
            <span class="text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </span>
        </li>
        <li class="dark:text-gray-300 text-gray-500">{{ $monthName }}</li>
    </x-common.breadcrumb>
    <div class="max-w-screen-lg prose dark:prose-invert prose-h1:tracking-tight mx-auto px-2 sm:px-6 lg:px-8 my-4 sm:my-12 lg:my-16">
        <h1>Entradas de {{ $monthName }} del {{ $year }}</h1>
    </div>
    <div class="bg-white dark:bg-slate-800 shadow-lg py-4 my-2 sm:my-6 lg:my-8">
        <div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 space-y-12 py-16">
            @foreach ($posts as $post)
                <article class="relative flex flex-col max-w-3xl lg:ml-auto lg:max-w-none lg:w-[50rem]">
                    <h3 class="text-xl tracking-tight font-bold dark:text-white dark:hover:text-orange-300">
                        <a class="underline dark:text-white dark:hover:text-orange-300" href="{{ $post->link() }}">{{ $post->title }}</a>
                    </h3>
                    <div class="mb-4 prose dark:prose-invert">
                        <p class="dark:text-gray-400">{{ $post->summary }}</p>
                    </div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm mt-auto flex flex-row-reverse items-center justify-end">
                        <dl>
                            <dt class="sr-only">Fecha</dt>
                            <dd class="text-sm leading-7 lg:absolute lg:top-0 lg:right-full sm:mr-8 lg:whitespace-nowrap">
                                {{ $post->date->day . ' ' . $monthName }}
                            </dd>
                        </dl>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-guest-layout>