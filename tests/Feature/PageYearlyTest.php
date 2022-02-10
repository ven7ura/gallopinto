<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\get;
use Tests\Factories\PostFactory;

beforeEach(function () {
    Storage::fake('projects');
});

it('shows a list of all the posts in the year', function () {
    $lastYear = Carbon::today()->subYear(1);

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
        ->assertDontSee('My mechanics');
});
