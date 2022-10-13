<?php

namespace App\View\Components\Dashboard\Pictures;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

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
        $posts = Cache::get('deviantart');

        return view('components.dashboard.pictures.deviantart', compact('posts'));
    }
}
