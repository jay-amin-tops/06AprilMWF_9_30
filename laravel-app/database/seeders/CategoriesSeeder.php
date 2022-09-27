<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table("categories")->insert([
                "category_title" => $faker->title(),
                "category_description" => $faker->paragraph,
                "created_at" => date("Y-m-d"),
                "updated_at" => date("Y-m-d"),
            ]);
        }
    }
}
