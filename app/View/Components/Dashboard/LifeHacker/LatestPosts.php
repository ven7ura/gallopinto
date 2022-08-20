<?php

namespace App\View\Components\Dashboard\LifeHacker;

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
        $posts = Cache::get('latest-life-hacker-posts');

        return view('components.dashboard.life-hacker.latest-posts', compact('posts'));
    }
}
