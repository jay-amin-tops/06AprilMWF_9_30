<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table("books")->insert([
                "book_title" => $faker->title(),
                "book_description" => $faker->paragraph,
                "price" => $faker->numberBetween(25, 5000),
                "author_id" => $faker->numberBetween(1, 10),
                "category_id" => $faker->numberBetween(1, 10),
                "created_at" => date("Y-m-d"),
                "updated_at" => date("Y-m-d"),
            ]);
        }
    }
}
