<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'news',
            'slug' => 'news',
        ]);
        Category::create([
            'name' => 'test',
            'slug' => 'test',
        ]);
        Category::create([
            'name' => 'Neuro',
            'slug' => 'neuro',
        ]);
    }
}
