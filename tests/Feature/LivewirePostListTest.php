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
        ->assertDontSee('My Blog Title 20')
        ->call('nextPage')
        ->assertSee('My Blog Title 20')
        ->assertSee('My Blog Title 11')
        ->assertDontSee('My Blog Title 30')
        ->call('previousPage')
        ->assertDontSee('My Blog Title 20')
        ->assertSee('My Blog Title 30');
});

it('show pagination during browsing', function () {
    PostFactory::new()->createMultiple(20);

    Livewire::test('post-list')
        ->assertSee('Siguiente')
        ->assertDontSee('Anterior')
        ->call('nextPage')
        ->assertSee('Anterior')
        ->assertDontSee('Siguiente');
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
    ->assertDontSee('Siguiente')
    ->set('searchTerm', '')
    ->assertSee('Siguiente')
    ->assertSet('currentPage', 1);
});
