<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Tests\Factories\PostFactory;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    Storage::fake('posts');
});

function getPostFile(string $slug): string
{
    return Storage::disk('posts')
        ->get(Carbon::today()
            ->format('Y-m-d').".$slug.md");
}

it('creates new post file', function () {
    $postPath = PostFactory::new()
        ->create();

    $this->assertFileExists($postPath);
});

it('sets the post title', function () {
    $postPath = PostFactory::new()
        ->title('My Blog Title')
        ->create();

    $this->assertStringContainsString('my-blog-title.md', $postPath);
    $this->assertStringContainsString('My Blog Title', getPostFile('my-blog-title'));
});

it('sets the post categories', function () {
    $postPath = PostFactory::new()
        ->categories([
            'Laravel',
            'Testing',
        ])->create();

    $this->assertStringContainsString('Laravel', getPostFile('my-blog-title'));
    $this->assertStringContainsString('Testing', getPostFile('my-blog-title'));
});

it('sets the post content', function () {
    PostFactory::new()
        ->content('content')
        ->create();

    $this->assertStringContainsString('content', getPostFile('my-blog-title'));
});

it('sets the hidden attribute', function () {
    PostFactory::new()
        ->title('Hidden Post')
        ->hidden(true)
        ->create();
    $this->assertStringContainsString('hidden: true', getPostFile('hidden-post'));
});

it('sets the post date', function () {
    $lastMonth = Carbon::today()->subMonth(2);
    $dateFormat = $lastMonth->format('Y-m-d');

    $postPath = PostFactory::new()
        ->title('This was last month')
        ->date($lastMonth)
        ->create();

    $this->assertStringContainsString($dateFormat, $postPath);
});

it('creates multiple post files', function () {
    $posts = PostFactory::new()
        ->createMultiple(3);

    $this->assertFileExists($posts[0]);
    $this->assertFileExists($posts[1]);
    $this->assertFileExists($posts[2]);
});
