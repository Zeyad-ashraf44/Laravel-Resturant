<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Breakfast'],
            ['name' => 'Main Dish'],
            ['name' => 'Drink'],
            ['name' => 'Dessert'],
        ]);
    }
}
