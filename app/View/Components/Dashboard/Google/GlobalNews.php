<?php

namespace App\View\Components\Dashboard\Google;

use Illuminate\View\Component;
use Vedmant\FeedReader\Facades\FeedReader;

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
        $posts = collect(FeedReader::read('https://news.google.com/rss?hl=en-US&gl=US&ceid=US:en')->get_items())->forPage(1, 10);

        return view('components.dashboard.google.global-news', compact('posts'));
    }
}
