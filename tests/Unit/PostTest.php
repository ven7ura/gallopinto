<?php

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Tests\Factories\PostFactory;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    Storage::fake('posts');
});

it('finds the categories attached to the blog post', function () {
    PostFactory::new()
        ->title('Hello World')
        ->categories(['laravel', 'vue'])
        ->create();

    PostFactory::new()
        ->title('Hello My Friend')
        ->categories(['laravel'])
        ->create();

    PostFactory::new()
        ->title('Hidden My Friend')
        ->categories(['laravel'])
        ->hidden(true)
        ->create();

    PostFactory::new()
        ->title('Hello One Last Time')
        ->categories(['vue'])
        ->create();

    $posts = Post::findByCategory('laravel');

    expect($posts)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2);
});

it('finds a specific post by path', function () {
    PostFactory::new()
        ->title('Hello World')
        ->create();

    $today = Carbon::today();

    $post = Post::findByPath($today->year, $today->month, 'hello-world');

    expect($post)->toBeInstanceOf(Post::class);
    expect('Hello World')->toBe($post->title);
});

it('fails if a specific post by path is hidden', function () {
    PostFactory::new()
        ->title('Hidden World')
        ->hidden(true)
        ->create();

    $today = Carbon::today();

    $post = Post::findByPath($today->year, $today->month, 'hidden-world');

    expect($post)->toBeNull();
});

it('it finds the blog posts by searching the file names', function () {
    PostFactory::new()
        ->title('Hello World')
        ->categories(['laravel', 'vue'])
        ->content('I have the needle')
        ->create();

    PostFactory::new()
        ->title('Hidden World')
        ->categories(['laravel', 'vue'])
        ->content('I have the needle')
        ->hidden(true)
        ->create();

    PostFactory::new()
        ->title('Hello My Friend')
        ->categories(['laravel'])
        ->content('I have no content')
        ->create();

    PostFactory::new()
        ->title('Hello One Last Time')
        ->categories(['vue'])
        ->content('I do have content')
        ->create();

    $post = Post::findBySearch('world');

    expect($post)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(1);
});

it('finds the blog posts for the month', function () {
    $lastMonth = Carbon::today()->subMonth(2);

    PostFactory::new()
        ->title('My mechanics')
        ->date($lastMonth)
        ->content('This is a mechanics blog')
        ->categories(['Mechanic', 'Logger'])
        ->create();

    PostFactory::new()
        ->title('Hello World')
        ->content('My blog content')
        ->categories(['Business', 'Laravel'])
        ->create();

    PostFactory::new()
        ->title('Hidden World')
        ->content('My blog content')
        ->hidden(true)
        ->categories(['Business', 'Laravel'])
        ->create();

    $today = Carbon::today();

    $post = Post::findByMonthly($today->year, $today->month);

    expect($post)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(1);
});

it('finds the blog posts for the year', function () {
    $lastYear = Carbon::today()->subYear();

    PostFactory::new()
        ->title('My mechanics')
        ->date($lastYear)
        ->content('This is a mechanics blog')
        ->categories(['Mechanic', 'Logger'])
        ->create();

    PostFactory::new()
        ->title('Hello World')
        ->content('My blog content')
        ->categories(['Business', 'Laravel'])
        ->create();

    PostFactory::new()
        ->title('Hidden World')
        ->content('My blog content')
        ->hidden(true)
        ->categories(['Business', 'Laravel'])
        ->create();

    $today = Carbon::today();

    $post = Post::findByYearly($today->year);

    expect($post)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(1);
});

it('returns the count of all the blog posts', function () {
    PostFactory::new()
        ->title('My mechanics')
        ->content('This is a mechanics blog')
        ->categories(['Mechanic', 'Logger'])
        ->create();

    PostFactory::new()
        ->title('Hello World')
        ->content('My blog content')
        ->categories(['Business', 'Laravel'])
        ->create();

    PostFactory::new()
        ->title('Hello World Hidden')
        ->content('My blog content for the hidden post')
        ->hidden(true)
        ->categories(['Business', 'Laravel'])
        ->create();

    expect(Post::count())->toEqual(2);
});

it('paginates the blog posts that are unhidden', function () {
    PostFactory::new()
        ->createMultiple(30);

    PostFactory::new()
        ->hidden(true)
        ->createMultiple(20);

    $pageOnePosts = Post::paginate(15, 1);

    expect($pageOnePosts)->toHaveCount(15);
    expect($pageOnePosts->first()->title)->toEqual('My Blog Title 30');
});

it('outputs the correct link path', function () {
    Storage::fake('posts');

    PostFactory::new()
        ->title('Hello World')
        ->create();

    $today = Carbon::today();

    $post = Post::findByPath($today->year, $today->month, 'hello-world');

    expect($post->link())->toBe(env('APP_URL')."/blog/{$today->format('Y')}/{$today->format('m')}/hello-world");
});
