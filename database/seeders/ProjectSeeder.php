<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $new_project = new Project();
            $new_project->title = $faker->sentence(3);

            //add type_id 
            //$new_project->type_id = $faker->randomElement([0, 1, 2, 3, 4]);

            //add cover_img without faker because it doesn't work
            $new_project->cover_img = 'default.png';
            $new_project->description = $faker->paragraph();
            $new_project->language = $faker->word();
            $new_project->save();
        }
    }
}
