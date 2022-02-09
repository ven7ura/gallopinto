<?php

namespace App\Parsers;

use Spatie\Sheets\PathParser;

class SlugWithProjectAndOrderParser implements PathParser
{
    public function parse(string $path): array
    {
        $parts = explode('/', $path);

        $filename = array_pop($parts);

        [$project, $order, $slug] = explode('.', $filename);

        return [
            'project' => $project,
            'order' => $order,
            'slug' => implode('/', array_merge($parts, [$slug])),
        ];
    }
}