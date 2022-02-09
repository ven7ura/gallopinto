<?php

namespace Tests\Factories;

use Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ProjectFactory
{
    private string $title = 'My project title';
    private string $project = 'My project';
    private int $order = 1;
    private string $content = '';
    private bool $hidden = false;

    public static function new(): ProjectFactory
    {
        return new static();
    }

    public function create(): string
    {
        return $this->createProjectFile($this->title, $this->project, $this->order);
    }

    public function createMultiple(int $times): Collection
    {
        return collect()->times($times, function ($currentCount, $key) use ($times) {
            $order = $times - ($currentCount - 1);

            return $this->createProjectFile($this->title, $this->project, $order);
        });
    }

    private function createProjectFile(string $title = null, string $project = null, int $order = 1): string
    {
        $slug = Str::slug($title ?? $this->title);
        $project = Str::slug($project ?? $this->project);
        $path = "{$project}.{$order}.{$slug}.md";
        $destinationPath = Storage::disk('projects')
            ->getAdapter()
            ->getPathPrefix().$path;

        copy(base_path('tests/dummyProject.md'), $destinationPath);
        $this->replaceFileDummyContent($path, $title, $this->hidden);

        return $destinationPath;
    }

    private function replaceFileDummyContent(string $path, string $title, bool $listed): void
    {
        $fileContent = Storage::disk('projects')
            ->get($path);
        $replacedFileContent = Str::of($fileContent)
            ->replace('{{blog_title}}', $title)
            ->replace('{{content}}', $this->content)
            ->replace('{{hidden}}', $listed ? 'true' : 'false');

        Storage::disk('projects')
            ->put($path, $replacedFileContent);
    }

    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function project(string $project): self
    {
        $this->project = $project;

        return $this;
    }
    
    public function order(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
