<?php

namespace App\View\Components\Dashboard\Pictures;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Vedmant\FeedReader\Facades\FeedReader;

class Deviantart extends Component
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
        $posts = Cache::remember('deviantart', 600, function () {
            return collect(
                FeedReader::read('https://backend.deviantart.com/rss.xml?type=deviation&q=boost:popular+in:wallpaper+sort:time+wallpaper+space')->get_items()
            )->filter(function ($post) {
                return !$post->get_thumbnail() == null;
            })->forPage(1, 15);
        });

        return view('components.dashboard.pictures.deviantart', compact('posts'));
    }
}
