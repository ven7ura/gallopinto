<?php

use App\View\Components\Dashboard\Reddit\HotNews;
use Tests\Traits\MakesApiCalls;

uses(MakesApiCalls::class);

it('component loads reddit information', function () {
    $res = $this->fakeRedditApiCall(10, 'Popular title', 'popular');
    $firstPost = $res['data']['children'][0]['data'];
    $lastPost = $res['data']['children'][9]['data'];
    $firstTitle = $firstPost['title'];
    $lastTitle = $lastPost['title'];
    $url = $firstPost['url'];
    $thumbnail = $firstPost['thumbnail'];

    $view = $this->component(HotNews::class);

    $view->assertSee($firstTitle)
        ->assertSee($lastTitle)
        ->assertSee($url)
        ->assertSee($thumbnail);
});
