<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\get;
use Tests\Factories\ProjectFactory;

beforeEach(function () {
    Storage::fake('projects');
});

it('shows an specific project page', function () {
    $project = ProjectFactory::new()
        ->title('Introduccion')
        ->order(1)
        ->codename('my-project')
        ->create();

    get('/proyectos/my-project/introduccion')
        ->assertStatus(200)
        ->assertSee('Introduccion');
});

it('shows a 404 error if no project page is found', function () {
    get('proyectos/this-does-not-exists/hello-world')
        ->assertNotFound();
});
