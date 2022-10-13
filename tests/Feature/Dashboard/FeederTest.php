<?php

use App\View\Components\Dashboard\Defaults\Feeder;
use App\View\Components\Dashboard\Google\GlobalNews;
use App\View\Components\Dashboard\HackerNews\LatestPosts;
use App\View\Components\Dashboard\LifeHacker\LatestPosts as LifeHackerLatestPosts;
use App\View\Components\Dashboard\Pictures\Deviantart;
use Tests\Traits\MakesRssCalls;
use Vedmant\FeedReader\Facades\FeedReader;

uses(MakesRssCalls::class);

test('that the feeder default view shows correctly all the posts that are requested', function () {
    $response = $this->fakeRssCall();
    $url = 'https://test.test/rss';

    FeedReader::shouldReceive('read')
        ->once()
        ->with($url)
        ->andReturn($response);

    $posts = collect(FeedReader::read($url)->get_items())->forPage(1, 10);

    $view = $this->component(Feeder::class, ['posts' => $posts]);

    $this->assertCount(10, $posts);

    $view->assertSee($posts->first()->get_title())
        ->assertSee($posts->first()->get_link())
        ->assertSee($posts->last()->get_title())
        ->assertSee($posts->last()->get_link());
});

test('that the global news component loads the correct data', function () {
    $posts = $this->fakeRssItems(5);

    Cache::shouldReceive('get')
        ->once()
        ->with('global-news')
        ->andReturn($posts);

    $view = $this->component(GlobalNews::class);

    $view->assertSee($posts->first()->get_title());
});

test('that the latests post from hacker news component loads the correct data', function () {
    $posts = $this->fakeRssItems(5);

    Cache::shouldReceive('get')
        ->once()
        ->with('latest-hacker-news-posts')
        ->andReturn($posts);

    $view = $this->component(LatestPosts::class);

    $view->assertSee($posts->first()->get_title());
});

test('that the latests post from life hacker news component loads the correct data', function () {
    $posts = $this->fakeRssItems(5);

    Cache::shouldReceive('get')
        ->once()
        ->with('latest-life-hacker-posts')
        ->andReturn($posts);

    $view = $this->component(LifeHackerLatestPosts::class);

    $view->assertSee($posts->first()->get_title());
});

test('that the latests post from deviantart component loads the correct data', function () {
    $posts = $this->fakeRssItems(5);

    Cache::shouldReceive('get')
        ->once()
        ->with('deviantart')
        ->andReturn($posts);

    $view = $this->component(Deviantart::class);

    $view->assertSee($posts->first()->get_thumbnail()['url']);
});
