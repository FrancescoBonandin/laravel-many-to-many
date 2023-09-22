<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

       $technologies=[

        'Vue',
        'Sass',
        'Laravel',
       ];

       foreach($technologies as $technologyName ){

            Technology::create([
            'technology_name' =>$technologyName,
            
            ]);
        };
    }
}