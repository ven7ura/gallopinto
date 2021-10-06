<div>
    <div x-data="{ open: new URLSearchParams(location.search).get('searchTerm') ?? false }">
        <div>
            <h2>From the blog:</h2>
            <button @click="open = !open">Search</button>
        </div>
        <div id="search" x-cloak x-show="open">Hello my friend</div>
        <ul>
            @foreach ($results as $post)
                <li>
                    <a href="{{ $post->url }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @if(!$query)
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
