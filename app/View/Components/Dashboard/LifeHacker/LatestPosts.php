<?php

namespace App\View\Components\Dashboard\LifeHacker;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Vedmant\FeedReader\Facades\FeedReader;

class LatestPosts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $posts = Cache::remember('latest-life-hacker-posts', 600, function () {
            return collect(
                FeedReader::read('https://lifehacker.com/rss')->get_items()
            )->forPage(1, 10);
        });

        return view('components.dashboard.life-hacker.latest-posts', compact('posts'));
    }
}
