<?php

namespace App\Parsers;

use Spatie\Sheets\PathParser;

class SlugWithProjectAndOrderParser implements PathParser
{
    public function parse(string $path): array
    {
        [$codename, $filename] = explode('/', $path);

        // $filename = array_pop($parts);

        [$order, $chapter] = explode('.', $filename);

        return [
            'codename' => $codename,
            'order' => $order,
            'chapter' => $chapter,
            'slug' => implode('/', [$codename, $chapter]),
        ];
    }
}
