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
    public function __invoke(Request $request, $codename)
    {
        $projects = Project::findByProject($codename);

        $projectName = $projects->first()->project;
        // $projectName = Str::title(str_replace('-', ' ', $projects->first()->project));

        return view('pages.project.detail', compact('projects', 'projectName'));
    }
}
