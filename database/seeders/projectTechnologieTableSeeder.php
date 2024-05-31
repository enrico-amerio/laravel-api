<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technologie;

class projectTechnologieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 25; $i++){
            $project = Project::inRandomOrder()->first();
            $technologie_id = Technologie::inRandomOrder()->first()->id;

            $project->technologies()->attach($technologie_id);

        }
    }
}
