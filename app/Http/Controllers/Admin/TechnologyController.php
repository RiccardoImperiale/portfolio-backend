<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::orderByDesc('id')->paginate(5);
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name, '-');

        $technology = Technology::create($validated);
        return to_route('admin.technologies.index')->with('message', "Type $technology->name created successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name, '-');

        $technology->update($validated);

        return to_route('admin.technologies.index', $technology)->with('message', "Tech $technology->name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return to_route('admin.technologies.index', $technology)->with('message', "Technology $technology->name deleted successfully");
    }
}
