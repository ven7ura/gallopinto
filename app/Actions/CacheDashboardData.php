<?php

namespace App\Actions;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Cache;
use Vedmant\FeedReader\Facades\FeedReader;

class CacheDashboardData
{
    public function __invoke()
    {
        $client = new Client([
            'base_uri' => 'https://api.reddit.com/r/',
            'headers' => [
                'accept' => 'application/json',
                'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
            ],
        ]);

        $promises = [
            'css' => $client->getAsync('css/top?t=day&limit=10'),
            'futurology' => $client->getAsync('futurology/top?t=day&limit=10'),
            'hot-news' => $client->getAsync('popular/top?t=day&limit=10'),
            'laravel' => $client->getAsync('laravel/top?t=day&limit=10'),
            'programming' => $client->getAsync('programming/top?t=day&limit=10'),
            'trending-news' => $client->getAsync('all/rising?limit=10'),
            'vue' => $client->getAsync('vuejs/top?t=day&limit=10'),
            'wallpapers' => $client->getAsync('wallpapers/top?t=day&limit=10'),
            'world-news' => $client->getAsync('worldnews/top/?sort=top&t=day&limit=10'),
        ];

        $responses = Utils::settle(
            Utils::unwrap($promises),
        )->wait();

        $css = collect(json_decode($responses['css']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);
        $futurology = collect(json_decode($responses['futurology']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);
        $hotNews = collect(json_decode($responses['hot-news']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);
        $laravel = collect(json_decode($responses['laravel']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);
        $programming = collect(json_decode($responses['programming']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);
        $trendingNews = collect(json_decode($responses['trending-news']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);
        $vue = collect(json_decode($responses['vue']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);
        $wallpapers = collect(json_decode($responses['wallpapers']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);
        $worldNews = collect(json_decode($responses['world-news']['value']->getBody()->getContents(), true)['data']['children'])->forPage(1, 10);

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

        Cache::put('css', $css);
        Cache::put('futurology', $futurology);
        Cache::put('hot-news', $hotNews);
        Cache::put('laravel', $laravel);
        Cache::put('programming', $programming);
        Cache::put('trending-news', $trendingNews);
        Cache::put('vue', $vue);
        Cache::put('wallpapers', $wallpapers);
        Cache::put('world-news', $worldNews);
    }
}
