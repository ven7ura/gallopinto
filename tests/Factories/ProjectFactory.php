<?php

namespace Tests\Factories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Str;

class ProjectFactory
{
    private string $title = 'My project title';
    private string $codename = 'my-project';
    private string $project = 'Hagamos un Blog';
    private int $order = 1;
    private string $content = '';
    private bool $hidden = false;

    public static function new(): ProjectFactory
    {
        return new static();
    }

    public function create(): string
    {
        return $this->createProjectFile($this->title, $this->codename, $this->order);
    }

    public function createMultiple(int $times): Collection
    {
        return collect()->times($times, function ($currentCount, $key) use ($times) {
            $order = $times - ($currentCount - 1);

            return $this->createProjectFile($this->title, $this->codename, $order);
        });
    }

    private function createProjectFile(string $title = null, string $codename = null, int $order = 1): string
    {
        $slug = Str::slug($title ?? $this->title);
        $codename = Str::slug($codename ?? $this->codename);
        $path = "{$codename}/{$order}.{$slug}.md";
        Storage::disk('projects')->makeDirectory($codename);
        $destinationPath = Storage::disk('projects')
            ->path($path);

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
            ->replace('{{project_name}}', $this->project)
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

    public function codename(string $codename): self
    {
        $this->codename = $codename;

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

    public function project(string $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function hidden(bool $hidden): self
    {
        $this->hidden = $hidden;

        return $this;
    }
}
