<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=1; $i<=10; $i++){
            $products = new Product();
            $products->name = $faker->randomElement(Product::pluck('name')). 'coffee';
            $products->quantity = $faker->numberBetween($min = 1, $max = 10);
            $products->price = $faker->numberBetween($min = 10, $max = 10000);
            $products->save();
        }

    }
}
