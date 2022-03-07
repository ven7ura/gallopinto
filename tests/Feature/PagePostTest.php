<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\get;
use Tests\Factories\PostFactory;

beforeEach(function () {
    Storage::fake('posts');
});

it('shows a specific post', function () {
    $post = PostFactory::new()
        ->title('Hello World')
        ->content('My blog content')
        ->categories(['Business', 'Laravel'])
        ->create();

    $today = Carbon::today();
    $pathDate = $today->format('Y/m');

    get("/blog/$pathDate/hello-world")
        ->assertStatus(200)
        ->assertSee('Hello World')
        ->assertSee('business')
        ->assertSee('laravel')
        ->assertSee('My blog content');
});

it('shows a 404 error if no post is found', function () {
    get('/blog/2015/23/hello-world')
        ->assertNotFound();
});

it('does not show if a blog post is hidden', function () {
    $post = PostFactory::new()
        ->title('Hello World')
        ->content('My blog content')
        ->categories(['Business', 'Laravel'])
        ->hidden(true)
        ->create();

    $secondPost = PostFactory::new()
        ->title('Hello world')
        ->hidden(false);

    $today = Carbon::today();
    $pathDate = $today->format('Y/m');

    get("/blog/$pathDate/hello-world")
        ->assertNotFound();
});
