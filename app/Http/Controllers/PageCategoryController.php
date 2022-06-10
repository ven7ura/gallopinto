<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $category = Str::ucfirst($category);

        if ($posts->isEmpty()) {
            abort(404);
        }

        return view('pages.category', compact(['posts', 'category']));
    }
}
