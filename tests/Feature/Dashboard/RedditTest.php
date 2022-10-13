<?php

use App\View\Components\Dashboard\Defaults\Reddit;
use App\View\Components\Dashboard\Reddit\Css;
use App\View\Components\Dashboard\Reddit\Futurology;
use App\View\Components\Dashboard\Reddit\HotNews;
use App\View\Components\Dashboard\Reddit\Laravel;
use App\View\Components\Dashboard\Reddit\Programming;
use App\View\Components\Dashboard\Reddit\TrendingNews;
use App\View\Components\Dashboard\Reddit\Vue;
use App\View\Components\Dashboard\Reddit\Wallpapers;
use App\View\Components\Dashboard\Reddit\WorldNews;
use Illuminate\Support\Facades\Cache;
use Tests\Traits\MakesApiCalls;

uses(MakesApiCalls::class);

test('that the reddit default view shows correctly all the posts that are given', function () {
    $response = $this->fakeRedditApiCall(10, 'Popular title', 'popular');
    $posts = collect($response['data']['children']);

    $firstPost = $posts->first()['data'];
    $lastPost = $posts->last()['data'];
    $firstTitle = $firstPost['title'];
    $lastTitle = $lastPost['title'];
    $firstUrl = $firstPost['url'];
    $firstThumbnail = $firstPost['thumbnail'];

    $view = $this->component(Reddit::class, ['posts' => $posts]);

    $view->assertSee($firstTitle)
        ->assertSee($lastTitle)
        ->assertSee($firstUrl)
        ->assertSee($firstThumbnail);
});

test('css component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'CSS', 'css');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('css')
        ->andReturn($posts);

    $view = $this->component(Css::class);

    $view->assertSee($posts->first()['data']['title']);
});

test('futurology component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'Futurology', 'futurology');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('futurology')
        ->andReturn($posts);

    $view = $this->component(Futurology::class);

    $view->assertSee($posts->first()['data']['title']);
});

test('hot-news component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'Hot and new', 'hot');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('hot-news')
        ->andReturn($posts);

    $view = $this->component(HotNews::class);

    $view->assertSee($posts->first()['data']['title']);
});

test('laravel component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'Laravel', 'laravel');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('laravel')
        ->andReturn($posts);

    $view = $this->component(Laravel::class);

    $view->assertSee($posts->first()['data']['title']);
});

test('programming component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'Programming', 'programming');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('programming')
        ->andReturn($posts);

    $view = $this->component(Programming::class);

    $view->assertSee($posts->first()['data']['title']);
});

test('trending-news component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'Trending News', 'trending-news');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('trending-news')
        ->andReturn($posts);

    $view = $this->component(TrendingNews::class);

    $view->assertSee($posts->first()['data']['title']);
});

test('vue component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'Vue', 'vue');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('vue')
        ->andReturn($posts);

    $view = $this->component(Vue::class);

    $view->assertSee($posts->first()['data']['title']);
});

test('wallpapers component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'Wallpapers', 'wallpapers');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('wallpapers')
        ->andReturn($posts);

    $view = $this->component(Wallpapers::class);

    $view->assertSee($posts->first()['data']['title']);
});

test('world-news component loads the correct cache data', function () {
    $response = $this->fakeRedditApiCall(10, 'World News', 'world-news');
    $posts = collect($response['data']['children']);

    Cache::shouldReceive('get')
        ->once()
        ->with('world-news')
        ->andReturn($posts);

    $view = $this->component(WorldNews::class);

    $view->assertSee($posts->first()['data']['title']);
});
