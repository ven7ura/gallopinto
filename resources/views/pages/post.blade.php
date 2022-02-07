<x-guest-layout title="{{ $post->title }}">
    <div class="flex flex-col-reverse md:flex-row max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8">
        <article class="prose md:pt-2 sm:px-6 lg:px-8 md:prose-lg lg:prose-xl sm:flex-col-reverse">
            {{ $post->contents }}
        </article>
        <aside class="text-sm md:text-base lg:text-lg sm:px-6 lg-px-8 pt-2">
            <div>
                {{ $post->date->monthName . ' ' . $post->date->year }}
            </div>
            <div>
                @foreach ($post->categories as $category)
                    <a href="{{ route('page.category', $category) }}">{{ $category }}</a>    
                @endforeach
            </div>
        </aside>
    </div>
</x-guest-layout>