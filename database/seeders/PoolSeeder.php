<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pool;
use App\Models\pool_category;

class PoolSeeder extends Seeder
{
    public function run(): void
    {
        $pools = [
            [
                'name' => 'Kolam Anak',
                'description' => 'Kolam renang khusus anak-anak dengan kedalaman 80cm',
                'price_per_hour' => 50000,
                'capacity' => 10,
                'is_available' => true,
                'image' => 'kolam-anak.jpg',
            ],
            [
                'name' => 'Kolam Dewasa',
            'description' => 'Kolam untuk dewasa dengan kedalaman 1.5 meter',
            'price_per_hour' => 75000,
            'capacity' => 20,
            'is_available' => true,
            'image' => 'kolam-dewasa.jpg',
            ]
        ];

        foreach ($pools as $pool) {
            $pool_categories = pool_category::where('name', $pool['Category'])->first();
            Pool::create([
                'name' => $pool['name'],
                'description' => $pool['description'],
                'price_per_hour' => $pool['price_per_hour'],
                'capacity' => $pool['capacity'],
                'is_available' => $pool['is_available'],
                'image' => $pool['image'],
            ]);
        }

    }
}
