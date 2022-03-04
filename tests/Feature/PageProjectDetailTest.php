<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\get;
use Tests\Factories\ProjectFactory;

beforeEach(function () {
    Storage::fake('projects');
});

it('shows a ordered list of all the project content', function () {
    $projects = ProjectFactory::new()
        ->title('Aprendamos algo nuevo')
        ->codename('Hydrophonics')
        ->createMultiple(10);

    get('/proyectos/hydrophonics')
        ->assertStatus(200)
        ->assertSee('Aprendamos algo nuevo');
});

it('returns a 404 if no project is found', function () {
    get('proyectos/esto-no-existe')
        ->assertNotFound();
});
