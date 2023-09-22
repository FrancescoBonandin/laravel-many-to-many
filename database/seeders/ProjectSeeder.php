<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models

use App\Models\Project;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for($i=0;$i<20;$i++){

            $randomTypeId = null;
            if (fake()->boolean(75)) {
                $randomTypeId = Type::inRandomOrder()->first()->id;
            }

            $title=fake()->words(rand(1,5),true);


            Project::create([

                'title'=>$title,
                'slug'=>str()->slug($title),
                'description'=>fake()->paragraph(2),
                'type_id'=>$randomTypeId,
            ]);
        };
    }
}
