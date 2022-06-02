<?php

namespace Tests\Factories;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Str;

class PostFactory
{
    private string $title = 'My Blog Title';

    private array $categories = [];

    private string $content = '';

    private bool $hidden = false;

    private $date = null;

    public static function new(): self
    {
        return new static();
    }

    public function create(): string
    {
        $date = $this->date ?? Carbon::now();

        return $this->createPostFile($this->title, $date);
    }

    public function createMultiple(int $times): Collection
    {
        $date = $this->date ?? Carbon::today();

        return collect()->times($times, function ($currentCount, $key) use ($date, $times) {
            $postTitleNumber = $times - ($currentCount - 1);

            return $this->createPostFile($this->title.' '.$postTitleNumber, $date->subDays($key));
        });
    }

    private function createPostFile(string $title = null, Carbon $date = null): string
    {
        $date = $date ?? Carbon::today();
        $slug = Str::slug($title ?? $this->title);
        $path = "{$date->format('Y-m-d')}.{$slug}.md";
        $destinationPath = Storage::disk('posts')
            ->path($path);

        copy(base_path('tests/dummy.md'), $destinationPath);
        $this->replaceFileDummyContent($path, $title);

        return $destinationPath;
    }

    private function replaceFileDummyContent(string $path, string $title): void
    {
        $fileContent = Storage::disk('posts')
            ->get($path);
        $replacedFileContent = Str::of($fileContent)
            ->replace('{{blog_title}}', $title)
            ->replace('{{categories}}', implode(', ', $this->categories))
            ->replace('{{content}}', $this->content)
            ->replace('{{hidden}}', $this->hidden ? 'true' : 'false');

        Storage::disk('posts')
            ->put($path, $replacedFileContent);
    }

    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function categories(array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function date(Carbon $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function hidden(bool $hidden): self
    {
        $this->hidden = $hidden;

        return $this;
    }
}
