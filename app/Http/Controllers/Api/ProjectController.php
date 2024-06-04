<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technologie;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('type', 'technologies')->get();
        return response()->json($projects);
    }
    public function getTechnologies(){
        $technologies = Technologie::all();
        return response()->json($technologies);
    }
    public function getTypes(){
        $types = Type::all();
        return response()->json($types);
    }

    public function getProjectInfo($id){
        $project = Project::where('id', $id)->with('type', 'technologies')->first();
        return response()->json($project);
    }
}
