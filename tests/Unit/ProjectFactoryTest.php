<?php

use Tests\TestCase;
use Tests\Factories\ProjectFactory;
use Illuminate\Support\Facades\Storage;

uses(TestCase::class);

beforeEach(function () {
    Storage::fake('projects');
});

function getProjectFile(string $slug, string $project, int $order): string
{
    return Storage::disk('projects')
        ->get("{$project}.{$order}.{$slug}.md");
}

it('creates new project file', function () {
    $projectPath = ProjectFactory::new()
        ->create();

    $this->assertFileExists($projectPath);
});

it('sets the project title', function () {
    $projectPath = ProjectFactory::new()
        ->title('My Project')
        ->order(1)
        ->project('Project')
        ->create();


    $this->assertStringContainsString('my-project.md', $projectPath);
    $this->assertStringContainsString('My Project', getProjectFile('my-project', 'project', 1));
});

it('sets the project content', function () {
    ProjectFactory::new()
        ->content('content')
        ->create();

    $this->assertStringContainsString('content', getProjectFile('my-project-title', 'my-project', 1));
});

it('creates multiple post files', function () {
    $projects = ProjectFactory::new()
        ->createMultiple(3);

    $this->assertFileExists($projects[0]);
    $this->assertFileExists($projects[1]);
    $this->assertFileExists($projects[2]);
});
