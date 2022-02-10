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

    get($pathDate)
        ->assertStatus(200)
        ->assertSee('Hello World')
        ->assertDontSee('My mechanics');
});
