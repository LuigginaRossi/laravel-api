<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {        
        $types= Type::all();

        for ($i=0; $i < 50 ; $i++) { 
            Project::create([
                "name" =>$faker->title(),
                "description" =>$faker->realText(), 
                "cover_img"=> 'https://picsum.photos/200/300', 
                "github_link"=> 'https://laravel.com/docs/9.x/pagination#simple-pagination', 
                "completed" =>true, 
                "type_id" =>$types->random()->id,                
            ]);
        }
    }
}
