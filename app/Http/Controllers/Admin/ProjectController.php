<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(6);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->title, '-');

        if ($request->has('image')) {
            $validated['image'] = Storage::put('uploads', $request->image);
        }

        $project = Project::create($validated);

        if ($request->has('technologies')) {
            $project->technologies()->attach($validated['technologies']);
        }

        return to_route('admin.projects.index')->with('message', "Project $project->title created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($request->title, '-');

        if ($request->has('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }

            $validated['image'] = Storage::put('uploads', $request->image);
        }

        $project->update($validated);

        if ($request->has('technologies')) {
            $project->technologies()->sync($validated['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return to_route('admin.projects.index', $project)->with('message', "Project $project->title updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }

        $project->technologies()->detach();

        $project->delete();
        return to_route('admin.projects.index')->with('message', "Project $project->title deleted successfully");
    }
}
