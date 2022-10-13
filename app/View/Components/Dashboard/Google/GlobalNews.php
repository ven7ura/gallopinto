<?php

namespace App\View\Components\Dashboard\Google;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class GlobalNews extends Component
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
        $posts = Cache::get('global-news');

        return view('components.dashboard.google.global-news', compact('posts'));
    }
}
