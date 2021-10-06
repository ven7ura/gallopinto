<div>
    <ul>
        @foreach ($posts as $post)
           <li>{{ $post->title }}</li> 
        @endforeach
    </ul>
</div>