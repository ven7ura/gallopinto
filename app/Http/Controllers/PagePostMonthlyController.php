<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class PagePostMonthlyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $year, $month)
    {
        $posts = Post::findByMonthly($year, $month);

        if ($posts->isEmpty()) {
            abort(404);
        }

        $post = $posts->first();
        $monthName = Str::ucfirst($post->date->monthName);
        $year = Str::ucfirst($post->year);

        return view('pages.blog.monthly', compact('posts', 'monthName', 'year'));
    }
}
