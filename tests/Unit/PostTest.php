<?php

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Tests\Factories\PostFactory;
use Tests\TestCase;

uses(TestCase::class);

it('finds a specific post by path', function () {
    Storage::fake('posts');

    PostFactory::new()
        ->title('Hello World')
        ->create();

    $today = Carbon::today();

    $post = Post::findByPath($today->year, $today->month, 'hello-world');

    expect($post)->toBeInstanceOf(Post::class);
    expect('Hello World')->toBe($post->title);
});

it('outputs the correct link path', function () {
    Storage::fake('posts');

    PostFactory::new()
        ->title('Hello World')
        ->create();

    $today = Carbon::today();

    $post = Post::findByPath($today->year, $today->month, 'hello-world');

    expect($post->link())->toBe('http://gallopint.test/blog/2022/02/hello-world');
});
