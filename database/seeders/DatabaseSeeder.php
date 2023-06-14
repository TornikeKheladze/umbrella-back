<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * uncoment to Seed the application's database with 100000 products
         * and 10 category
         */
        // Image::factory(10000)->create();
        // Category::factory(10)->create();

        Image::factory(10)->create();
        Category::factory(4)->create();
        $products = Product::all();
        $categories = Category::pluck('id');

        foreach ($products as $product) {
            $product->categories()->attach($categories->random(rand(1, 3)));
        }
    }
}
