<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $projects=Project::all();

       return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types=Type::all();

        $technologies=Technology::all();

        return view('projects.create',compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $formData=$request->validated();
        $slug=str()->slug($formData['title']);

        $ImagePath = null;
        if (isset($formData['img'])) {
            $ImagePath = Storage::put('uploads/images', $formData['img']);
        }

        $project=Project::create([
            'title'=> $formData['title'],
            'slug'=> $slug,
            'description'=> $formData['description'],
            'type_id'=>$formData['type_id'],
            'img'=>$ImagePath
        ]);

        if (isset($formData['technologies'])) {
            foreach ($formData['technologies'] as $technologyId) {
                                                
                                                
                $project->technologies()->attach($technologyId);  
            }
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        

       return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types=Type::all();

        $technologies=Technology::all();

        return view('projects.edit',compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $formData=$request->validated();
        $slug=str()->slug($formData['title']);

        $ImagePath = $project->img;
        if (isset($formData['img'])) {
            if ($project->img) {
                Storage::delete($project->img);
            }

            $ImagePath = Storage::put('uploads/images', $formData['img']);
        }
        else if (isset($request['checkbox'])) {
            if ($project->img) {
                Storage::delete('uploads/images',$project->img);
            }

            $ImagePath = null;
        }
        

        $project->update(
            [
                'title'=>$formData['title'],
                'slug'=>$slug,
                'description'=>$formData['description'],
                'type_id'=>$formData['type_id'],
                'img'=>$ImagePath

            ]
        );

        if (isset($formData['technologies'])) {
            $project->technologies()->sync($formData['technologies']);
        }
        else {
            $project->technologies()->detach();
        }


        return redirect()->route('admin.projects.index',);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project=Project::destroy($project->id);
        
        return redirect()->route('admin.projects.index');
    }
}
