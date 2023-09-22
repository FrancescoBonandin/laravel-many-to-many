<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


// Facades
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

       $types=[

        'HTML',
        'CSS',
        'JS',
        'PHP',
       ];

       foreach($types as $typeName ){

        Type::create([
            'type_name' =>$typeName,
            
        ]);
       }
    }
}
