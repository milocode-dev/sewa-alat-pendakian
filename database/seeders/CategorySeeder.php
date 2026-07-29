<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['category_name' => 'Tenda']);
        Category::create(['category_name' => 'Carier 60L']);
        Category::create(['category_name' => 'Trekking Pole']);
        Category::create(['category_name' => 'Daypack']);
        Category::create(['category_name' => 'Hdyropack']);
        Category::create(['category_name' => 'Kacamata']);
    }
}
