<div>
    <div x-data="{ searchOpen: new URLSearchParams(location.search).get('searchTerm') ?? false }">
        <div>
            <h2>From the blog:</h2>
            <button @click="searchOpen = !searchOpen">Search</button>
        </div>
        <div id="search" x-cloak x-show="searchOpen">
            <input type="text"
                   wire:model="searchTerm"
                   x-ref="search"
                   placeholder="Buscar por palabras claves como laravel, vue, etc..."
                   class="w-full form-input relative rounded-md shadow-sm p-4 text-xs md:text-lg lg:text-2xl text-center"
            >
        </div>
        <ul>
            @foreach ($results as $post)
                <li>
                    <a href="{{ $post->link() }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @if(!$searchTerm)
        <div>
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
