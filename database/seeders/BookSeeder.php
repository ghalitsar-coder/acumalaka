<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Sample Book 1',
            'author' => 'John Doe',
            'description' => 'This is a sample book description',
            'year_published' => 2023,
        ]);

        Book::create([
            'title' => 'Sample Book 2',
            'author' => 'Jane Smith',
            'description' => 'Another sample book description',
            'year_published' => 2024,
        ]);
    }
}