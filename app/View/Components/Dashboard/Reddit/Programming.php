<?php

namespace App\View\Components\Dashboard\Reddit;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
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
        $posts = Cache::remember('programming', 600, function () {
            return collect(
                Http::withHeaders(['accept' => 'application/json'])
                    ->get('https://api.reddit.com/r/programming/top?t=day&limit=10')
                    ->json()['data']['children']
            );
        });

        return view('components.dashboard.reddit.programming', compact('posts'));
    }
}
