<?php

namespace App\Parsers;

use Spatie\Sheets\PathParser;

class SlugWithProjectAndOrderParser implements PathParser
{
    public function parse(string $path): array
    {
        $parts = explode('/', $path);

        $filename = array_pop($parts);

        [$codename, $order, $slug] = explode('.', $filename);

        return [
            'codename' => $codename,
            'order' => $order,
            'slug' => implode('/', array_merge($parts, [$slug])),
        ];
    }
}
