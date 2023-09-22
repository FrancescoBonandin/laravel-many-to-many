<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies=Technology::all();

        return view('technologies.index', compact('technologies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $formData=$request->validated();

        Technology::create([
            'technology_name'=>$formData['technology_name']
        
        ]);
        return redirect()->route('admin.technologies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {

        return view('technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit',compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
                
        $formData=$request->validated();

        $technology->update([
            'technology_name'=> $formData['technology_name'],
        ]);

        return redirect()->route('admin.technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology=technology::destroy($technology->id);
        
        return redirect()->route('admin.technologies.index');
    }
}
