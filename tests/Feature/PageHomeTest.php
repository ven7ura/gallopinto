<?php

use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\get;
use Tests\Factories\PostFactory;

beforeEach(function () {
    Storage::fake('posts');
});

it('sees posts list component on home page', function () {
    get('/')->assertSeeLivewire('post-list');
});

it('lists the posts', function () {
    PostFactory::new()->createMultiple(5);

    get('/')
        ->assertSee('My Blog Title 1')
        ->assertSee('My Blog Title 2')
        ->assertSee('My Blog Title 3')
        ->assertSee('My Blog Title 4')
        ->assertSee('My Blog Title 5');
});

it('lists the latest blog posts first', function () {
    PostFactory::new()->createMultiple(5);

    get('/')
        ->assertSeeInOrder([
            'My Blog Title 5',
            'My Blog Title 4',
            'My Blog Title 3',
            'My Blog Title 2',
            'My Blog Title 1',
        ]);
});

it('it paginates post lists', function () {
    PostFactory::new()->createMultiple(30);

    for ($postCount = 30; $postCount > 20; --$postCount) {
        $this->get('/')
                ->assertSee("My Blog Title $postCount");
    }

    $this->get('/')
            ->assertDontSee('My Blog Title 20');
});
