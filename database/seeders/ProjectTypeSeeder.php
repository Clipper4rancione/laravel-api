<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Prendo tutti i progetti e li ciclo
        $projects = Project::all();
        foreach ($projects as $project) {
            //Ad ogni ciclo estraggo un id random dalla tabella Types
            //In questo modo prendiamo gli id del Type
            $type_id = Type::inRandomOrder()->first()->id;
            $project->type_id = $type_id;
            //Faccio l'update dei progetti del ciclo con gli id dei types
            $project->update();
        }
    }
}
