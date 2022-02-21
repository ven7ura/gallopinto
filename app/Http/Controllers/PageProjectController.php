<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PageProjectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $codename, $slug)
    {
        $project = Project::findByPath($codename, $slug);

        if (!$project) {
            abort(404);
        }

        return view('pages.project.post', compact('project'));
    }
}
