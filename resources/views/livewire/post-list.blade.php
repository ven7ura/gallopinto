<div>
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
