<?php

namespace App\View\Components\Dashboard\Reddit;

use Cache;
use Illuminate\View\Component;

class HotNews extends Component
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
        $posts = Cache::get('hot-news');

        return view('components.dashboard.reddit.hot-news', compact('posts'));
    }
}
