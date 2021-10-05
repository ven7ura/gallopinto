<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\Sheets\Facades\Sheets;
use Spatie\Sheets\Sheet;
use Str;

class Post extends Sheet
{
    public function getYearAttribute(): string
    {
        return Carbon::parse($this->attributes['date'])->format('Y');
    }

    public function getMonthAttribute(): string
    {
        return Carbon::parse($this->attributes['date'])->format('m');
    }

    public static function findByPath($year, $month, string $slug)
    {
        return Sheets::all()
            ->where('year', $year)
            ->where('month', $month)
            ->where('slug', $slug)
            ->first();
    }

    public static function findBySearch(string $query): Collection
    {
        return Sheets::all()
            ->sortByDesc('date')
            ->filter(function ($file) use ($query) {
                return Str::contains($file, $query);
            });
    }

    public static function count(): int
    {
        return Sheets::all()->count();
    }

    public static function paginate(int $postPerPage, int $page): Collection
    {
        return Sheets::all()
            ->sortByDesc('date')
            ->skip(($page - 1) * $postPerPage)
            ->take($postPerPage);
    }
}
