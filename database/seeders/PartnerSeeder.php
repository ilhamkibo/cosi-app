<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'photo_url' => '/images/partners/ypci.png',
            'alt_text' => 'COSI Partner | YPCI',
        ]);
        Partner::create([
            'photo_url' => '/images/partners/aus.png',
            'alt_text' => 'COSI Partner | Australian Consulat',
        ]);
        Partner::create([
            'photo_url' => '/images/partners/hilon.png',
            'alt_text' => 'COSI Partner | Hilon',
        ]);
        Partner::create([
            'photo_url' => '/images/partners/ipro.png',
            'alt_text' => 'COSI Partner | IPRO',
        ]);
        Partner::create([
            'photo_url' => '/images/partners/rapel.png',
            'alt_text' => 'COSI Partner | Rapel',
        ]);
        Partner::create([
            'photo_url' => '/images/partners/goodvibes.png',
            'alt_text' => 'COSI Partner | Goodvibes',
        ]);
        Partner::create([
            'photo_url' => '/images/partners/veolia.png',
            'alt_text' => 'COSI Partner | Veolia Services',
        ]);
    }
}
