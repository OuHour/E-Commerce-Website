<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create([
            'name' => 'Laptops'
        ]);
        Category::create([
            'name' => 'Smartphones'
        ]);
        Category::create([
            'name' => 'Tablets'
        ]);
        Category::create([
            'name' => 'Monitors'
        ]);
    }
}