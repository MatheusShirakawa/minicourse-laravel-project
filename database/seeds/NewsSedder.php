<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       $faker = Faker::create();

       for ($i=0; $i < 10; $i++) { 
           
           DB::table('news')->insert([    
                'title'       => $faker->sentence,
                // 'image'       => $faker->image,
                'image'       => str_replace('public/storage/','', $faker->image('public/storage/images',400,300)),
                'subtitle'    => $faker->paragraph,
                'description' => $faker->paragraph,
                'category_id' => '1',
           ]);
       }
    }
}
