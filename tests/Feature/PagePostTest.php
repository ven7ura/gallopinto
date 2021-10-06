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

    get("$pathDate/hello-world")
        ->assertStatus(200)
        ->assertSee('Hello World')
        ->assertSee('business')
        ->assertSee('laravel')
        ->assertSee('My blog content');
});

it('shows a 404 error if no post is found', function () {
    get('2015/23/hello-world')
        ->assertNotFound();
});
