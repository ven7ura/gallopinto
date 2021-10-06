<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $year, $month, $slug)
    {
        $post = Post::findByPath($year, $month, $slug);

        if (!$post) {
            abort(404);
        }

        return view('pages.post', compact('post'));
    }
}
