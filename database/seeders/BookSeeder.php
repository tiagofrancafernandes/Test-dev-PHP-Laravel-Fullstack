<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory(30)
            ->create()
            ->each(
                fn (Author $author) => Book::factory(10)->create([
                    'author_id' => $author->id,
                ])
            );
    }
}
