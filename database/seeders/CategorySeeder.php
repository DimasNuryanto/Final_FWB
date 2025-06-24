<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\pool_Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $pool_categories = [
            'Umum',
            'Anak-anak',
            'Keluarga',
            'VIP',
            'Outdoor',
            'Indoor',
        ];

        foreach ($pool_categories as $pool_category) {
            pool_category::create([
                'name' => $pool_category,
            ]);
        }
    }
}
