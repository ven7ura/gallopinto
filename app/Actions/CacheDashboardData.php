<?php

namespace App\Actions;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Vedmant\FeedReader\Facades\FeedReader;

class CacheDashboardData
{
    public function __invoke()
    {
        Cache::put(
            'global-news',
            collect(FeedReader::read('https://news.google.com/rss?hl=en-US&gl=US&ceid=US:en')->get_items())->forPage(1, 10)
        );

        Cache::put(
            'latest-hacker-news-posts',
            collect(FeedReader::read('https://news.ycombinator.com/rss')->get_items())->forPage(1, 10)
        );

        Cache::put(
            'latest-life-hacker-posts',
            collect(FeedReader::read('https://lifehacker.com/rss')->get_items())->forPage(1, 10)
        );

        Cache::put(
            'deviantart',
            collect(FeedReader::read('https://backend.deviantart.com/rss.xml?type=deviation&q=boost:popular+in:wallpaper+sort:time+wallpaper+space')->get_items())
                ->filter(function ($post) {
                    return !$post->get_thumbnail() == null;
                })->forPage(1, 15)
        );

        Cache::put(
            'css',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/css/top?t=day&limit=10')
                    ->json()['data']['children']
            )
        );

        Cache::put(
            'futurology',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/futurology/top?t=day&limit=10')
                    ->json()['data']['children']
            )
        );

        Cache::put(
            'hot-news',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/popular/top?t=day&limit=10')
                    ->json()['data']['children']
            )
        );

        Cache::put(
            'laravel',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/laravel/top?t=day&limit=10')
                    ->json()['data']['children']
            )
        );

        Cache::put(
            'programming',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/programming/top?t=day&limit=10')
                    ->json()['data']['children']
            )
        );

        Cache::put(
            'trending-news',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/all/rising?limit=10')
                    ->json()['data']['children']
            )
        );

        Cache::put(
            'vue',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/vuejs/top?t=day&limit=10')
                    ->json()['data']['children']
            )
        );

        Cache::put(
            'wallpapers',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/wallpapers/top/?sort=top&t=day&limit=9')
                    ->json()['data']['children']
            )->forPage(1, 15)
        );

        Cache::put(
            'world-news',
            collect(Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/worldnews/top/?sort=top&t=day&limit=10')
                    ->json()['data']['children']
            )
        );
    }
}
