<?php

use function Pest\Laravel\get;
use Tests\Traits\MakesApiCalls;
use Tests\Traits\MakesRssCalls;

uses(MakesRssCalls::class, MakesApiCalls::class);

it('has dashboard page', function () {
    $feederPosts = $this->fakeRssItems(10);
    $redditPosts = collect($this->fakeRedditApiCall(10)['data']['children']);

    // Reddit
    Cache::shouldReceive('get')->once()->with('hot-news')->andReturn($redditPosts);
    Cache::shouldReceive('get')->once()->with('css')->andReturn($redditPosts);
    Cache::shouldReceive('get')->once()->with('futurology')->andReturn($redditPosts);
    Cache::shouldReceive('get')->once()->with('laravel')->andReturn($redditPosts);
    Cache::shouldReceive('get')->once()->with('programming')->andReturn($redditPosts);
    Cache::shouldReceive('get')->once()->with('trending-news')->andReturn($redditPosts);
    Cache::shouldReceive('get')->once()->with('vue')->andReturn($redditPosts);
    Cache::shouldReceive('get')->once()->with('wallpapers')->andReturn($redditPosts);
    Cache::shouldReceive('get')->once()->with('world-news')->andReturn($redditPosts);

    // RSS Data
    Cache::shouldReceive('get')->once()->with('global-news')->andReturn($feederPosts);
    Cache::shouldReceive('get')->once()->with('latest-hacker-news-posts')->andReturn($feederPosts);
    Cache::shouldReceive('get')->once()->with('latest-life-hacker-posts')->andReturn($feederPosts);
    Cache::shouldReceive('get')->once()->with('deviantart')->andReturn($feederPosts);

    $response = get('dashboard');

    $response->assertOk()
        ->assertViewIs('dashboard');
});
