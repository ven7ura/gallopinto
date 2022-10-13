<?php

namespace App\View\Components\Dashboard\Reddit;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Programming extends Component
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
        $posts = Cache::get('programming');

        return view('components.dashboard.reddit.programming', compact('posts'));
    }
}
