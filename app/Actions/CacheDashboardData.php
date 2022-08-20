<?php

namespace App\Actions;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Vedmant\FeedReader\Facades\FeedReader;

class CacheDashboardData
{
    public function __invoke()
    {
        Cache::remember('global-news', 599, function () {
            return collect(
                FeedReader::read('https://news.google.com/rss?hl=en-US&gl=US&ceid=US:en')->get_items()
            )->forPage(1, 10);
        });

        Cache::add('global-news', collect(FeedReader::read('https://news.google.com/rss?hl=en-US&gl=US&ceid=US:en')->get_items())->forPage(1, 10));

        Cache::remember('latest-hacker-news-posts', 599, function () {
            return collect(
                FeedReader::read('https://news.ycombinator.com/rss')->get_items()
            )->forPage(1, 10);
        });

        Cache::remember('latest-life-hacker-posts', 599, function () {
            return collect(
                FeedReader::read('https://lifehacker.com/rss')->get_items()
            )->forPage(1, 10);
        });

        Cache::remember('deviantart', 599, function () {
            return collect(
                FeedReader::read('https://backend.deviantart.com/rss.xml?type=deviation&q=boost:popular+in:wallpaper+sort:time+wallpaper+space')->get_items()
            )->filter(function ($post) {
                return !$post->get_thumbnail() == null;
            })->forPage(1, 15);
        });

        Cache::remember('css', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/css/top?t=day&limit=10')
                    ->json()['data']['children']
            );
        });

        Cache::remember('futurology', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/futurology/top?t=day&limit=10')
                    ->json()['data']['children']
            );
        });

        Cache::remember('hot-news', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/popular/top?t=day&limit=10')
                    ->json()['data']['children']
            );
        });

        Cache::remember('laravel', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/laravel/top?t=day&limit=10')
                    ->json()['data']['children']
            );
        });

        Cache::remember('programming', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/programming/top?t=day&limit=10')
                    ->json()['data']['children']
            );
        });

        Cache::remember('trending-news', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/all/rising?limit=10')
                    ->json()['data']['children']
            );
        });

        Cache::remember('vue', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/vuejs/top?t=day&limit=10')
                    ->json()['data']['children']
            );
        });

        Cache::remember('wallpapers', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/wallpapers/top/?sort=top&t=day&limit=9')
                    ->json()['data']['children']
            )->forPage(1, 15);
        });

        Cache::remember('world-news', 599, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/worldnews/top/?sort=top&t=day&limit=10')
                    ->json()['data']['children']
            );
        });
    }
}
