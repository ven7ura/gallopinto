<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $category)
    {
        $posts = Post::findByCategory($category);

        return view('pages.category', compact(['posts', 'category']));
    }
}
