<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'name' => 'All',
            'slug' => 'all',
            "description" => "All Lovely Stuff",
            "photo_url" => "/images/products/categories/all-1.png",
        ]);

        ProductCategory::create([
            'name' => 'Chairs',
            'slug' => 'chairs',
            "description" => "Lovely Chairs",
            "photo_url" => "/images/products/categories/chair-1.png",
        ]);

        ProductCategory::create([
            'name' => 'Tables',
            'slug' => 'tables',
            "description" => "Lovely Tables",
            "photo_url" => "/images/products/categories/table-1.png",
        ]);

        ProductCategory::create([
            'name' => 'Others',
            'slug' => 'others',
            "description" => "Lovely Stuff",
            "photo_url" => "/images/products/categories/other-1.png",
        ]);
    }
}
