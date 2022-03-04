<?php

use App\Models\Post;
use App\Models\Project;
use App\Parsers\SlugWithProjectAndOrderParser;
use Spatie\Sheets\PathParsers\SlugWithDateParser;
use Spatie\Sheets\ContentParsers\MarkdownWithFrontMatterParser;

return [
    'default_collection' => 'posts',

    'collections' => [
        'posts' => [
            'disk' => 'posts',
            'sheet_class' => Post::class,
            'path_parser' => SlugWithDateParser::class,
            'content_parser' => MarkdownWithFrontMatterParser::class,
            'extension' => 'md',
        ],
        'projects' => [
            'disk' => 'projects',
            'sheet_class' => Project::class,
            'path_parser' => SlugWithProjectAndOrderParser::class,
            'content_parser' => MarkdownWithFrontMatterParser::class,
            'extension' => 'md',
        ],
    ],
];
