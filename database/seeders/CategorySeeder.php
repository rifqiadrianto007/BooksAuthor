<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Novel']);
        Category::create(['name' => 'Komik']);
        Category::create(['name' => 'Buku Pelajaran']);
    }
}
