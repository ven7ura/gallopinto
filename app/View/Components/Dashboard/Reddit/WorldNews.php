<?php

namespace App\View\Components\Dashboard\Reddit;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class WorldNews extends Component
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
        $posts = Cache::remember('world-news', 600, function () {
            return collect(
                Http::withHeaders(
                    [
                        'accept' => 'application/json',
                        'User-Agent' => 'ven7ura.com:v1 (by /u/ven7ura)',
                    ])
                    ->get('https://api.reddit.com/r/worldnews/top/?sort=top&t=day&limit=10')
                    ->json()['data']['children']
            );
        });

        return view('components.dashboard.reddit.world-news', compact('posts'));
    }
}
