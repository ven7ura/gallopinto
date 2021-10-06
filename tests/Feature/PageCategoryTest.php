<?php

use function Pest\Laravel\get;
use Tests\Factories\PostFactory;

it('shows posts only from one category', function () {
    Storage::fake('posts');

    PostFactory::new()
        ->categories(['Business', 'Laravel', 'Vacations'])
        ->title('Blog went well')
        ->create();

    PostFactory::new()
        ->categories(['Laravel'])
        ->title('This is a laravel blog')
        ->create();

    PostFactory::new()
        ->categories(['Business'])
        ->title('This is my business')
        ->create();

    get('category/business')
        ->assertSuccessful()
        ->assertSee('Blog went well')
        ->assertSee('This is my business')
        ->assertDontSee('This is a laravel blog');
});
