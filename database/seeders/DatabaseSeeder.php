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
        Image::factory(10)->create();
        Category::factory(6)->create();
        $products = Product::all();
        $categories = Category::pluck('id');

        foreach ($products as $product) {
            $product->categories()->attach($categories->random(rand(1, 3)));
        }
    }
}
