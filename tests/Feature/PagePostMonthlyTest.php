<?php

use Carbon\Carbon;
use function Pest\Laravel\get;
use Tests\Factories\PostFactory;

beforeEach(function () {
    Storage::fake('posts');
});

it('shows all the post for the month', function () {
    $lastMonth = Carbon::today()->subMonth(2);

    $outdatedPost = PostFactory::new()
        ->title('My mechanics')
        ->date($lastMonth)
        ->content('This is a mechanics blog')
        ->categories(['Mechanic', 'Logger'])
        ->create();

    $post = PostFactory::new()
        ->title('Hello World')
        ->content('My blog content')
        ->categories(['Business', 'Laravel'])
        ->create();

    $today = Carbon::today();
    $pathDate = $today->format('Y/m');

    get("/blog/$pathDate")
        ->assertStatus(200)
        ->assertSee('Hello World')
        ->assertDontSee('My mechanics')
        ->assertViewIs('pages.blog.monthly');
});

it('returns 404 if no results are found', function () {
    get('blog/2025/12')
        ->assertNotFound();
});
