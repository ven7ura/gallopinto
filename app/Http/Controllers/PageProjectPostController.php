<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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
        $projectName = $post->project;

        if (!$post) {
            abort(404);
        }

        return view('pages.project.post', compact('post', 'projectName'));
    }
}
