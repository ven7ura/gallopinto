<?php

use App\Models\Project;
use Illuminate\Support\Collection;
use Tests\Factories\ProjectFactory;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    Storage::fake('projects');
});

it('finds a specific project by path', function () {
    ProjectFactory::new()
        ->title('Hello World')
        ->codename('Hydrophonics')
        ->create();

    $project = Project::findByPath('hydrophonics', 'hello-world');

    expect($project)->toBeInstanceOf(Project::class);
    expect('Hello World')->toBe($project->title);
});

it('finds all the project items and returns a collection', function () {
    ProjectFactory::new()
        ->title('Algo nuevo')
        ->codename('Hydrophonics')
        ->createMultiple(9);

    ProjectFactory::new()
        ->title('Something out of the scope')
        ->codename('Something else')
        ->create();

    ProjectFactory::new()
        ->title('This one is on the scope')
        ->order(9)
        ->codename('Hydrophonics')
        ->create();

    $projects = Project::findByProject('hydrophonics');

    expect($projects)->toBeInstanceOf(Collection::class);
    expect($projects)->toHaveCount(10);
});

it('returns all the unique projects on the blog', function () {
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

    $allProjects = Project::findAllProjects();

    expect($allProjects)->toBeInstanceOf(Collection::class);
    expect($allProjects)->toHaveCount(3);
});

it('outputs the correct link path', function () {
    ProjectFactory::new()
        ->title('Hello World')
        ->codename('Hydrophonics')
        ->create();

    $project = Project::findByPath('hydrophonics', 'hello-world');

    expect($project->link())->toBe('http://gallopint.test/proyectos/hydrophonics/hello-world');
});
