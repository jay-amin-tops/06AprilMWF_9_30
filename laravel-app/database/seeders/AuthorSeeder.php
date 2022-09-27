<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class AuthorSeeder extends Seeder
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
            DB::table("authors")->insert([
                "author_name" => $faker->name(),
                "author_description" => $faker->paragraph,
                "created_at" => date("Y-m-d"),
                "updated_at" => date("Y-m-d"),
            ]);
        }
    }
}
