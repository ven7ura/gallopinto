<?php

use Carbon\Carbon;
use function Pest\Laravel\get;
use Tests\Factories\PostFactory;

beforeEach(function () {
    Storage::fake('posts');
});

it('shows all the blog post for the year', function () {
    $lastYear = Carbon::today()->subYear();

    $outdatedPost = PostFactory::new()
        ->title('My mechanics')
        ->date($lastYear)
        ->content('This is a mechanics blog')
        ->categories(['Mechanic', 'Logger'])
        ->create();

    $post = PostFactory::new()
        ->title('Hello World')
        ->content('My blog content')
        ->categories(['Business', 'Laravel'])
        ->create();

    $today = Carbon::today();
    $pathDate = $today->format('Y');

    get("/blog/$pathDate")
        ->assertStatus(200)
        ->assertSee('Hello World')
        ->assertDontSee('My mechanics')
        ->assertViewIs('pages.blog.yearly');
});

it('returns 404 if the year is not correct or no content is found', function () {
    get('/blog/2034')
        ->assertNotFound();
});

it('does not show if a blog post is hidden', function () {
    $post = PostFactory::new()
        ->title('Hidden Content')
        ->content('My blog content')
        ->categories(['Business', 'Laravel'])
        ->hidden(true)
        ->create();

    $secondPost = PostFactory::new()
        ->title('Hello world')
        ->hidden(false);

    $today = Carbon::today();
    $pathDate = $today->format('Y/m');

    get("/blog/$today->year")
        ->assertDontSee('Hidden Content');
});
