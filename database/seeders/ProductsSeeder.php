<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            "service" => 1,
            "id_service" => 0,
	        "price" => 50,
        ]);

        Product::create([
            "service" => 1,
            "id_service" => 1,
	        "price" => 50,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 1,
			"id_proyectsub" => 0,
	        "price" => 10,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 2,
			"id_proyectsub" => 0,
	        "price" => 30,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 3,
			"id_proyectsub" => 0,
	        "price" => 50,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 1,
			"id_proyectsub" => 1,
	        "price" => 10,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 2,
			"id_proyectsub" => 1,
	        "price" => 30,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 3,
			"id_proyectsub" => 1,
	        "price" => 50,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 1,
			"id_proyectsub" => 2,
	        "price" => 10,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 2,
			"id_proyectsub" => 2,
	        "price" => 30,
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 3,
			"id_proyectsub" => 2,
	        "price" => 50,
        ]);
    }
}
