<x-guest-layout title="{{ $post->title }}">
    {{ $post->date->diffForHumans() }}
    @foreach ($post->categories as $category)
        <a href="{{ route('page.category', $category) }}">{{ $category }}</a>    
    @endforeach
    {{ $post->contents }}
</x-guest-layout>