<?php

namespace Database\Seeders;

use App\Models\CollectionProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CollectionProduct::create([
            'name' => 'Collection 1',
            'photo_url' => '/images/collections/collection-1.png',
            'alt_text' => 'collection 1',
        ]);

        CollectionProduct::create([
            'name' => 'Collection 2',
            'photo_url' => '/images/collections/collection-2.png',
            'alt_text' => 'collection 2',
        ]);

        CollectionProduct::create([
            'name' => 'Collection 3',
            'photo_url' => '/images/collections/collection-3.png',
            'alt_text' => 'collection 3',
        ]);

        CollectionProduct::create([
            'name' => 'Collection 4',
            'photo_url' => '/images/collections/collection-4.png',
            'alt_text' => 'collection 4',
        ]);
    }
}
