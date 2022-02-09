<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Str;

class PageProjectDetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $project)
    {
        $projects = Project::findByProject($project);

        $projectName = Str::title(str_replace('-', ' ', $projects->first()->project));

        return view('pages.project-detail', compact('projects', 'projectName'));
    }
}
