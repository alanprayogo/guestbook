<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'category_name' => 'Tamu Undangan',
        ]);
        \App\Models\Category::create([
            'category_name' => 'Tamu VIP',
        ]);
        \App\Models\Category::create([
            'category_name' => 'Keluarga Mempelai Pria',
        ]);
        \App\Models\Category::create([
            'category_name' => 'Keluarga Mempelai Wanita',
        ]);
    }
}
