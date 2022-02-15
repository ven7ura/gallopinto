<x-guest-layout title="{{ $post->title }}">
    <div class="flex flex-col-reverse md:flex-row max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8">
        <article class="prose prose-pre:bg-zinc-900 prose-h1:tracking-tighter prose-h2:font-extrabold prose-h2:tracking-tighter prose-h3:font-extrabold prose-h3:tracking-tighter pt-4 md:prose-lg lg:prose-xl sm:flex-col-reverse line-numbers">
            <div>
                {{ $post->date->monthName . ' ' . $post->date->year }}
            </div>
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