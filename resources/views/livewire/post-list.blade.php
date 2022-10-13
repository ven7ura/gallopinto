<div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 py-16">
    <div x-data="{ searchOpen: new URLSearchParams(location.search).get('searchTerm') ?? false }">
        <div class="flex items-center flex-col mb-4">
            <h2 class="text-2xl font-bold tracking-tight dark:text-white" id="blog-section"> Lo último del blog</h2>
            <p class="text-gray-500 dark:text-gray-400">Ultimas noticias y articulos</p>
            <button @click="searchOpen = !searchOpen; if (searchOpen) $nextTick(() => {$refs.search.focus()});">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 dark:text-white dark:hover:text-red-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
        <div class="py-2" id="search" x-cloak x-show="searchOpen">
            <input type="text" wire:model="searchTerm" x-ref="search"
                placeholder="Buscar por palabras claves como laravel, vue, etc..."
                class="border-2 border-slate-500 dark:border-slate-300 dark:bg-slate-200 w-full form-input relative rounded-md shadow-sm p-3 text-xs md:text-lg lg:text-2xl text-center" />
        </div>
        <div class="space-y-12 mt-4">
            @foreach ($results as $post)
            <article class="relative flex flex-col max-w-3xl lg:ml-auto lg:max-w-none lg:w-[50rem]">
                <h3 class="text-xl tracking-tight font-bold">
                    <a class="underline dark:text-white dark:hover:text-orange-300" href="{{ $post->link() }}">{{ $post->title }}</a>
                </h3>
                <div class="mb-4 prose text-gray-500 dark:text-gray-400 lg:prose-lg max-w-none">
                    <p>{{ $post->summary }}</p>
                </div>
                <div class="text-gray-500 dark:text-gray-300 text-sm mt-auto flex flex-row-reverse items-center justify-end">
                    <dl>
                        <dt class="sr-only">Fecha</dt>
                        <dd class="text-sm leading-7 lg:absolute lg:top-0 lg:right-full sm:mr-8 lg:whitespace-nowrap">
                            <a class="dark:hover:text-orange-300" href="{{ route('page.blog.monthly', ['year' => $post->date->year, 'month' => $post->date->format('m')]) }}">{{ Str::ucfirst($post->date->monthName) }}</a> <a class="dark:hover:text-orange-300" href="{{ route('page.blog.yearly', ['year' => $post->date->year]) }}">{{ $post->date->year }}</a>
                        </dd>
                    </dl>
                </div>
            </article>
            @endforeach
            </ul>
        </div>
        @if(!$searchTerm)
            <div class="flex justify-center" wire:loading>Loading...</div>
            <nav wire:loading.remove class="border-t border-t-gray-200 dark:border-t-slate-700 mt-8 px-4 flex items-center justify-between sm:px-0">
                <div class="w-0 flex-1 flex">
                    @if($currentPage !== 1)
                        <button wire:click="previousPage" class="-mt-px border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm leading-5 font-medium text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-orange-300 hover:border-gray-300 dark:hover:border-orange-300 focus:outline-none focus:text-gray-700 focus:border-gray-400 dark:focus:border-orange-300 transition ease-in-out duration-150">
                            <svg class="mr-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                clip-rule="evenodd"/>
                            </svg>
                            Anterior
                        </button>
                    @endif
                </div>
                <div class="hidden md:flex">
                    <span
                    class="border-t-2 dark:border-t-orange-300 border-textBlue dark:text-white pt-4 px-4 inline-flex items-center text-sm leading-5 font-medium text-textBlue focus:outline-none focus:textBlue focus:textBlue transition ease-in-out duration-150">
                        {{ $currentPage }} / {{ $pagesCount }}
                    </span>
                </div>
                <div class="w-0 flex-1 flex justify-end">
                    @if($pagesCount > 1 && $currentPage !== $pagesCount)
                        <button wire:click="nextPage" class="-mt-px border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm leading-5 font-medium text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-orange-300 hover:border-gray-300 dark:hover:border-orange-300 focus:outline-none focus:text-gray-700 focus:border-gray-400 dark:focus:border-orange-300 transition ease-in-out duration-15">
                            Siguiente
                            <svg class="ml-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"/>
                            </svg>
                        </button>
                    @endif
                </div>
            </nav>
        @endif
    </div>
</div>