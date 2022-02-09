<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Sheets;
use Spatie\Sheets\Sheet;

class Project extends Sheet
{
    public function getProjectAttribute(): string
    {
        return $this->attributes['project'];
    }

    public static function findByPath($project, $slug): self|null
    {
        return Sheets::collection('projects')->all()
            ->where('project', $project)
            ->where('slug', $slug)
            ->first();
    }

    public static function findByProject($project): Collection
    {
        return Sheets::collection('projects')->all()
            ->where('project', $project)
            ->sortBy('order');
    }

    public function link(): string
    {
        return route('page.project', ['project' => $this->project, 'slug' => $this->slug]);
    }
}
