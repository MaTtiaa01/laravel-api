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
            $new_project->cover_img = '/uploads/default.png';
            $new_project->description = $faker->paragraph();
            $new_project->save();
        }
    }
}
