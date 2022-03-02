<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageProjectPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $codename, $chapter)
    {
        $post = Project::findByPath($codename, $chapter);

        if (!$post) {
            abort(404);
        }

        $projectName = Str::headline($codename);

        return view('pages.project.post', compact('post', 'projectName'));
    }
}
