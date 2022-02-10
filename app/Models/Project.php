<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Sheets;
use Spatie\Sheets\Sheet;

class Project extends Sheet
{
    public function getCodenameAttribute(): string
    {
        return $this->attributes['codename'];
    }

    public static function findByPath($codename, $slug): self|null
    {
        return Sheets::collection('projects')->all()
            ->where('codename', $codename)
            ->where('slug', $slug)
            ->first();
    }

    public static function findByProject($codename): Collection
    {
        return Sheets::collection('projects')->all()
            ->where('codename', $codename)
            ->sortBy('order');
    }

    public static function findAllProjects()
    {
        return Sheets::collection('projects')->all()
            ->unique('codename');
    }

    public function link(): string
    {
        return route('page.project.post', ['codename' => $this->codename, 'slug' => $this->slug]);
    }
}
