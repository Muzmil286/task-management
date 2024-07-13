<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::simplePaginate(10);
        return Inertia::render('Project/Index',['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Project/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:projects,title|max:255',
            'url' => 'sometimes|unique:projects,url|max:255',
            'ipAddress' => 'sometimes|unique:projects,ip_address|max:255',
            'adminName' => 'required|max:255|string',
            'adminEmail' => 'required|max:255|email',
            'password' => 'required|min:5|max:255'
        ]);
        $project = Project::create($request->all());
        return redirect()->route('projects.index')->with('success' , 'Project added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return Inertia::render('Project/Show',['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return Inertia::render('Project/Edit',['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|max:255|unique:projects,title' . $project->id,
            'url' => 'sometimes|max:255|unique:projects,url' . $project->id,
            'ipAddress' => 'sometimes|max:255|unique:projects,ip_address' . $project->id,
            'adminName' => 'required|max:255|string',
            'adminEmail' => 'required|max:255|email',
            'password' => 'required|min:5|max:255'
        ]);
        $project->update($request->all());
        return redirect()->route('projects.index')->with('success' ,'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success' , 'Project deleted successfully');
    }
}
