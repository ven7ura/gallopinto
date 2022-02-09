<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PageProjectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $project, $slug)
    {
        $project = Project::findByPath($project, $slug);

        if (!$project) {
            abort(404);
        }

        return view('pages.project', compact('project'));
    }
}
