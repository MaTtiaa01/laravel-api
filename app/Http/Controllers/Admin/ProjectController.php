<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;

//take data from logged user
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->get();
        //dd($projects);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        $projects = Project::all();
        return view('admin.projects.create', compact('types', 'technologies', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //validate data
        $val_data = $request->validated();

        //save data
        //dd($val_data);

        //check if there is a file as cover_img
        if ($request->hasFile('cover_img')) {
            $cover_img = Storage::put('uploads', $val_data['cover_img']);

            $val_data['cover_img'] = $cover_img;
        }

        $new_project = Project::create($val_data);

        if ($request->has('technologies')) {
            $new_project->technologies()->attach($val_data['technologies']);
        }



        //return a view
        return to_route('admin.projects.index')->with('message', "$new_project->title added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //dd(Type::wherelike('id', $project->type_id));
        $types = Type::all();
        //dd($types[$project->type_id]);
        $technologies = Technology::all();
        return view('admin.projects.show', compact('project', 'types', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        //check if there is an image, if yes delete it and add the new one
        if ($request->hasFile('cover_img')) {

            if ($project->cover_img) {
                Storage::delete($project->cover_img);
            }

            $cover_img = Storage::put('uploads', $val_data['cover_img']);
            $val_data['cover_img'] = $cover_img;
        }

        $project->update($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($project['technologies']);
        } else {
            $project->technologies()->sync([]);
        }

        return to_route('admin.projects.index')->with('message', "$project->title updated successefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->cover_img) {
            Storage::delete($project->cover_img);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', "$project->title deleted successefully");
    }
}
