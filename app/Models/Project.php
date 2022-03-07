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

    public static function findByPath($codename, $chapter)
    {
        return Sheets::collection('projects')->all()
            ->where('hidden', false)
            ->where('codename', $codename)
            ->where('chapter', $chapter)
            ->first();
    }

    public static function findByProject($codename): Collection
    {
        return Sheets::collection('projects')->all()
            ->where('hidden', false)
            ->where('codename', $codename)
            ->sortBy('order');
    }

    public static function findAllProjects()
    {
        return Sheets::collection('projects')->all()
            ->sortBy('order')
            ->unique('codename');
    }

    public function chapterCount(): int
    {
        return Sheets::collection('projects')->all()
            ->where('codename', $this->codename)
            ->count();
    }

    public function link(): string
    {
        return route('page.project.post', ['codename' => $this->codename, 'chapter' => $this->chapter]);
    }
}
