<?php

namespace App\View\Components\Dashboard\HackerNews;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

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
        $posts = Cache::get('latest-hacker-news-posts');

        return view('components.dashboard.hacker-news.latest-posts', compact('posts'));
    }
}
