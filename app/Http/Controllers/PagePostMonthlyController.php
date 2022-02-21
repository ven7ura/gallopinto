<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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

        return view('pages.blog.monthly', compact('posts'));
    }
}
