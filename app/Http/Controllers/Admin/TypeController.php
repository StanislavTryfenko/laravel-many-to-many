<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\Type\StoreTypeRequest;
use App\Http\Requests\Type\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.types.index', ['types' => Type::orderBy('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name);
        Type::create($validated);
        return redirect()->route('admin.types.index')->with('message', 'Type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name'], '-');
        $type->update($validated);
        return redirect()->route('admin.types.index')->with('message', 'Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('message', 'Type deleted successfully');
    }
}
