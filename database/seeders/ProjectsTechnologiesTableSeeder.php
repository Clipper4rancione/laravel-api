<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 200; $i++) {

            //estraggo random un progetto
            $project = Project::inRandomOrder()->first();


            //estraggo un id random dalle tecnologie
            $technology_id = Technology::inRandomOrder()->first()->id;

            //inserisco il dato nella tabella pivot con attach()
            $project->technologies()->attach($technology_id);
        }
    }
}
