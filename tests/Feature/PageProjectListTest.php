<?php

use function Pest\Laravel\get;
use Tests\Factories\ProjectFactory;

beforeEach(function () {
    Storage::fake('projects');
});

it('shows the list of all unique projects on the site', function () {
    $firstProject = ProjectFactory::new()
        ->codename('first-project')
        ->project('My first project')
        ->createMultiple(2);

    $secondProject = ProjectFactory::new()
        ->codename('second-project')
        ->project('My second project')
        ->createMultiple(2);

    $thirdProject = ProjectFactory::new()
        ->codename('third-project')
        ->project('My third project')
        ->create();

    get('/proyectos')
        ->assertStatus(200)
        ->assertSee('My first project')
        ->assertSee('My second project')
        ->assertSee('My third project');
});
