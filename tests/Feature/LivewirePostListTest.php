<?php

use Illuminate\Support\Facades\Storage;
use Tests\Factories\PostFactory;

beforeEach(function () {
    Storage::fake('posts');
});

it('shows post per page', function () {
    PostFactory::new()->createMultiple(30);

    Livewire::test('post-list')
        ->assertSee('My Blog Title 30')
        ->assertDontSee('My Blog Title 15')
        ->call('nextPage')
        ->assertSee('My Blog Title 15')
        ->assertSee('My Blog Title 1')
        ->assertDontSee('My Blog Title 30')
        ->call('previousPage')
        ->assertDontSee('My Blog Title 15')
        ->assertSee('My Blog Title 30');
});

it('show pagination during browsing', function () {
    PostFactory::new()->createMultiple(30);

    Livewire::test('post-list')
        ->assertSee('Next')
        ->assertDontSee('Previous')
        ->call('nextPage')
        ->assertSee('Previous')
        ->assertDontSee('Next');
});

test('the method find by search works correctly', function () {
    PostFactory::new()
        ->title('Laravel new features')
        ->create();

    PostFactory::new()->createMultiple(40);

    Livewire::test('post-list')
    ->set('searchTerm', 'laravel')
    ->assertSee('Laravel');
});

it('resets pagination after search', function () {
    PostFactory::new()->createMultiple(100);

    Livewire::test('post-list')
    ->call('nextPage')
    ->assertSet('currentPage', 2)
    ->set('searchTerm', 'laravel')
    ->assertDontSee('Next')
    ->set('searchTerm', '')
    ->assertSee('Next')
    ->assertSet('currentPage', 1);
});
