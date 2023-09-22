<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Facades
use Illuminate\Support\Facades\Schema;

// Models

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });

        for($i=0;$i<20;$i++){

            $randomTypeId = null;
            if (fake()->boolean(75)) {
                $randomTypeId = Type::inRandomOrder()->first()->id;
            }

            $title=fake()->words(rand(1,3),true);

            Project::create([

                'title'=>$title,
                'slug'=>str()->slug($title),
                'description'=>fake()->paragraph(2),
                'type_id'=>$randomTypeId,
            ]);
        };
    }
}
