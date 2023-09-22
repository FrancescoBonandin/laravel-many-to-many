<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types=Type::all();

        return view('types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        //
        
        $formData=$request->validated();

        $type=Type::create([
            'type_name'=> $formData['type_name'],
        ]);

        // $project=new Project();
        // $project->title=$request->input('title');
        // $project->slug=str()->slug($request->input('title'));
        // $project->description=$request->input('description');
        // $project->save();


        return redirect()->route('admin.types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {

        return view('types.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
         //
        
         $formData=$request->validated();

         $type->update([
             'type_name'=> $formData['type_name'],
         ]);
 
         // $project=new Project();
         // $project->title=$request->input('title');
         // $project->slug=str()->slug($request->input('title'));
         // $project->description=$request->input('description');
         // $project->save();
 
 
         return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type=Type::destroy($type->id);
        
        return redirect()->route('admin.types.index');
    }
}
