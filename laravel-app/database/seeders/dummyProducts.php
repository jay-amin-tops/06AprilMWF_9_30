<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class dummyProducts extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i <100 ; $i++) {
            DB::table("products")->insert([
                "product_title" => $faker->name(),
                "product_description" => $faker->paragraph,
                "product_price" => $faker->numberBetween(25, 5000),
                "product_quantity" => $faker->numberBetween(25, 50),
                "created_at" =>date("Y-m-d"),
                "updated_at" =>date("Y-m-d"),
            ]);
        }
        //
    }
}
