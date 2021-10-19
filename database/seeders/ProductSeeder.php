<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $products = Product::factory()->count(5)->create();

        $faker = \Faker\Factory::create();
        $imageUrl = $faker->imageUrl(640,480, null, false);

        foreach($products as $product){
            $product->addMediaFromUrl($imageUrl)->toMediaCollection('product_image');
        }
    }
}
