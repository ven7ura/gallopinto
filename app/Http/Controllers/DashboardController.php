<?php

namespace App\Http\Controllers;

use FeedReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $reddit = collect(Http::get('https://api.reddit.com/r/laravel/top?t=day&limit=20')->json()['data']['children'])->forPage(1, 10);
        // $lifehacker = collect(FeedReader::read('https://lifehacker.com/rss')->get_items());

        return view('dashboard');
    }
}
