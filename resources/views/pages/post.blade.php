{{ $post->title}}
@foreach ($post->categories as $category)
    <a href="{{ route('page.category', $category) }}">{{ $category }}</a>    
@endforeach
{{ $post->contents }}