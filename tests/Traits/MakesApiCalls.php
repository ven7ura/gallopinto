<?php

namespace Tests\Traits;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait MakesApiCalls
{
    public function fakeRedditApiCall(int $limit = 10, string $title = null, string $subReddit = null)
    {
        $faker = Faker::create();
        $title ??= 'Test title';
        $subReddit ??= 'popular';
        $thumbWidth = 140;

        $url = 'https://api.reddit.com/*';

        $posts = collect()->times($limit, function ($currentCount, $key) use ($faker, $title, $subReddit, $thumbWidth, $limit) {
            $postTitleNumber = $limit - ($currentCount - 1);

            return [
                'kind' => 't3',
                'data' => [
                    'subreddit' => $subReddit,
                    'author_fullname' => 't2_'.Str::random(5),
                    'gilded' => $faker->boolean(),
                    'title' => $title.' '.$postTitleNumber,
                    'subreddit_name_prefixed' => "r/{$subReddit}",
                    'hidden' => false,
                    'downs' => 0,
                    'thumbmail_height' => $thumbHeight = $faker->randomElement([140, 119, 73, 128]),
                    'upvote_ratio' => $faker->randomElement([0.92, 0.90, 0.80, 0.82]),
                    'ups' => $faker->numberBetween(100000, 200000),
                    'total_awards_received' => $faker->numberBetween(50, 100),
                    'thumbnail_width' => $thumbWidth,
                    'thumbnail' => $faker->imageUrl($thumbWidth, $thumbHeight),
                    'edited' => false,
                    'permalink' => '/r/MadeMeSmile/comments/'.Str::random(5).'/secret_parenting_codes/',
                    'url' => 'https://i.redd.it/vtc4dc49zmg91.png',
                ],
            ];
        })->toArray();

        $response = [
            'kind' => 'Listing',
            'data' => [
                'after' => 't3_'.Str::random(5),
                'dist' => 10,
                'modhash' => Str::random(16),
                'children' => $posts,
                'before' => null,
            ],
        ];

        Http::fake([$url => Http::response($response)]);

        return $response;
    }
}
