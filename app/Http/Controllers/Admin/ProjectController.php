<?php

namespace App\Http\Controllers\Admin;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectsRequest;
use App\Models\Type;
use App\Models\Technologie;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technologie::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectsRequest $request)
    {
        $form_data = $request->all();

        $new_project = new Project();
        // $new_project-> title = $form_data['title'];
        // $new_project-> description = $form_data['description'];
        $new_project->fill($form_data);
        $new_project->save();
        if(array_key_exists('technologies', $form_data)){
            $new_project->technologies()->attach($form_data['technologies']);

        }


       return redirect()->route('admin.projects.index', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        $types = Type::all();
        $technologies = Technologie::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectsRequest $request, Project $project)
    {
         $form_data = $request->all();
         $project->update($form_data);
         return redirect()->route('admin.projects.index', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('deleted', 'Il progetto ' . $project->title . 'è stato eliminato!');
    }
}
