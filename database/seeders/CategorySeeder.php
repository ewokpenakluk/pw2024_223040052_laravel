<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data kategori yang akan dimasukkan
        $categories = [
            [
                'name' => 'Web Sport',
                'slug' => 'web-sport',
                'color' => 'green'
            ],
            [
                'name' => 'UI UX',
                'slug' => 'ui-ux',
                'color' => 'yellow'
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'machine-learning',
                'color' => 'blue'
            ],
            [
                'name' => 'Data Warehouse',
                'slug' => 'data-warehouse',
                'color' => 'red'
            ],
        ];

        // Menggunakan loop untuk membuat kategori
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
