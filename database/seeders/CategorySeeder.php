<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name'=>'fiction'],
            ['name'=>'sci-fi'],
            ['name'=>'mystery'],
            ['name'=>'romance'],
            ['name'=>'westerns'],
            ['name'=>'triller'],
            ['name'=>'dystopian'],
            ['name'=>'contemporary'],
            ['name'=>'mystery'],
            ['name'=>'mystery'],
            ['name'=>'history'],
            ['name'=>'children'],
            ['name'=>'health'],
            ['name'=>'cookbook'],
            ['name'=>'development'],
            ['name'=>'travel'],
            ['name'=>'humor'],
            ['name'=>'science'],
            ['name'=>'horror'],
            ['name'=>'arts'],
        ]);
    }
}
