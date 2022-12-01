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
            "nameproject" => "FID",
            "idtableaffected" => "level_fidsub",
            "priceidstripe" => "price_1MAD8UIevP8MvOlWFH5GpEi3",
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 2,
			"id_proyectsub" => 0,
	        "price" => 30,
            "nameproject" => "FID",
            "idtableaffected" => "level_fidsub",
            "priceidstripe" => "price_1MAD8UIevP8MvOlWFH5GpEi3",
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 3,
			"id_proyectsub" => 0,
	        "price" => 50,
            "nameproject" => "FID",
            "idtableaffected" => "level_fidsub",
            "priceidstripe" => "price_1MAD8UIevP8MvOlWFH5GpEi3",
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 1,
			"id_proyectsub" => 1,
	        "price" => 10,
            "nameproject" => "Proyecto Divina Pastora de las Almas",
            "idtableaffected" => "level_dpasub",
            "priceidstripe" => "price_1MAGA1IevP8MvOlWohMPhwdm",
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 2,
			"id_proyectsub" => 1,
	        "price" => 30,
            "nameproject" => "Proyecto Divina Pastora de las Almas",
            "idtableaffected" => "level_dpasub",
            "priceidstripe" => "price_1MAGA1IevP8MvOlWhWIWj6HP",
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 3,
			"id_proyectsub" => 1,
	        "price" => 50,
            "nameproject" => "Proyecto Divina Pastora de las Almas",
            "idtableaffected" => "level_dpasub",
            "priceidstripe" => "price_1MAGA2IevP8MvOlWqZSNXmdi",
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 1,
			"id_proyectsub" => 2,
	        "price" => 10,
            "nameproject" => "Proyecto Juan del Rincón",
            "idtableaffected" => "level_jdrsub",
            "priceidstripe" => "price_1MAGZhIevP8MvOlWRx93Dv4U",
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 2,
			"id_proyectsub" => 2,
	        "price" => 30,
            "nameproject" => "Proyecto Juan del Rincón",
            "idtableaffected" => "level_jdrsub",
            "priceidstripe" => "price_1MAGZhIevP8MvOlWVQIwqOCx",
        ]);

        Product::create([
            "service" => 0,
            "levelsub" => 3,
			"id_proyectsub" => 2,
	        "price" => 50,
            "nameproject" => "Proyecto Juan del Rincón",
            "idtableaffected" => "level_jdrsub",
            "priceidstripe" => "price_1MAGZhIevP8MvOlWJMrP9Wzh",
        ]);
    }
}
