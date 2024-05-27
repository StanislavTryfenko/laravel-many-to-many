<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderBy('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($request->name);

        if ($request->has('image')) {
            $validated['image'] = Storage::put('uploads', $validated['image']);
        }

        Project::create($validated);
        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'))->with('message', 'Project created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['name'], '-');

        if ($request->has('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $validated['image'] = Storage::put('uploads', $validated['image']);
        }

        $project->update($validated);

        return redirect()->route('admin.projects.show', $project)->with('message', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Project deleted successfully');
    }
}
