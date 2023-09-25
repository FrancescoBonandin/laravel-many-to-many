<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $technologies = Technology::all();

        // Loop through projects and attach technologies to them
        foreach ($projects as $project) {
            // Attach technologies to projects (you can use attach, sync, or other methods)
            $project->technologies()->sync($technologies->random(rand(0,count($technologies)))->pluck('id')->toArray());
        }
    }
}
