<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //aggiungere request $request
    public function index(Request $request){
        $project= Project::paginate();
        //faccio condizioni per query frontend
        return response()->json($project);
    }

    public function show(Project $project){
        $project->load('type', 'technologies');
        return response()->json($project);
    }
}
