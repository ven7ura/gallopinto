<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagePostYearlyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $year)
    {
        $posts = Post::findByYearly($year);

        if ($posts->isEmpty()) {
            abort(404);
        }

        return view('pages.blog.yearly', compact('posts'));
    }
}
