<x-guest-layout title="{{ $post->title }}">
    <x-common.breadcrumb>
        <li>
            <a href="{{ route('page.blog.yearly', ['year' => $post->year]) }}">
                {{ $post->year }}
            </a>
        </li>
        <li>
            <span class="text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </span>
        </li>
        <li>
            <a href="{{ route('page.blog.monthly', ['year' => $post->year, 'month' => $post->month]) }}">
                {{ Str::ucfirst($post->date->monthName) }}
            </a>
        </li>
        <li>
            <span class="text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </span>
        </li>
        <li class="text-gray-500">{{ $post->title }}</li>
    </x-common.breadcrumb>
    <div class="flex flex-col-reverse md:flex-row max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8">
        <article class="prose prose-pre:bg-zinc-900 prose-h1:tracking-tighter prose-h2:font-extrabold prose-h2:tracking-tighter prose-h3:font-extrabold prose-h3:tracking-tighter prose-h4:tracking-tighter pt-4 md:prose-lg lg:prose-xl sm:flex-col-reverse line-numbers">
            <div>
                {{ $post->contents }}
            </div>
        </article>
        <aside class="text-sm md:text-base lg:text-lg pt-4">
            <ul>
                @foreach ($post->categories as $category)
                    <li class="float-left pl-1 md:float-none md:p-1">
                        <a href="{{ route('page.category', $category) }}" class="text-gray-500">#{{ $category }}</a>    
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</x-guest-layout>