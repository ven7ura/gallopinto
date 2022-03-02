<div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 py-16">
    <div x-data="{ searchOpen: new URLSearchParams(location.search).get('searchTerm') ?? false }">
        <div class="flex items-center flex-col mb-2">
            <h2 class="text-2xl font-bold tracking-tight" id="blog-section"> Lo ultimo del blog</h2>
            <p class="text-gray-500">Ultimas noticias y articulos</p>
            <button @click="searchOpen = !searchOpen; if (searchOpen) $nextTick(() => {$refs.search.focus()});">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
        <div class="py-2" id="search" x-cloak x-show="searchOpen">
            <input type="text" wire:model="searchTerm" x-ref="search"
                placeholder="Buscar por palabras claves como laravel, vue, etc..."
                class="w-full form-input relative rounded-md shadow-sm p-4 text-xs md:text-lg lg:text-2xl text-center" />
        </div>
        <div class="space-y-12 mt-4">
            @foreach ($results as $post)
            <article class="relative flex flex-col max-w-3xl lg:ml-auto lg:max-w-none lg:w-[50rem]">
                <h3 class="text-xl tracking-tight font-bold">
                    <a href="{{ $post->link() }}">{{ $post->title }}</a>
                </h3>
                <div class="mb-4 prose max-w-none">
                    <p>{{ $post->summary }}</p>
                </div>
                <div class="text-gray-500 text-sm mt-auto flex flex-row-reverse items-center justify-end">
                    <dl>
                        <dt class="sr-only">Fecha</dt>
                        <dd class="text-sm leading-7 lg:absolute lg:top-0 lg:right-full sm:mr-8 lg:whitespace-nowrap">
                            <a href="{{ route('page.blog.monthly', ['year' => $post->date->year, 'month' => $post->date->format('m')]) }}">{{ Str::ucfirst($post->date->monthName) }}</a> <a href="{{ route('page.blog.yearly', ['year' => $post->date->year]) }}">{{ $post->date->year }}</a>
                        </dd>
                    </dl>
                </div>
            </article>
            @endforeach
            </ul>
        </div>
        @if(!$searchTerm)
        <div class="flex justify-center" wire:loading>Loading...</div>
        <div wire:loading.remove>
            <ul>
                @if($currentPage !== 1)
                <li>
                    Previous
                </li>
                @endif
                @if($pagesCount > 1 && $currentPage !== $pagesCount)
                <li>
                    Next
                </li>
                @endif
            </ul>
        </div>
        @endif
    </div>
</div>