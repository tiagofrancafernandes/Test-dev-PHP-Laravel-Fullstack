<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fake = fake('pt_BR');

        return [
            'title' => \sprintf('Livro %s', $fake->words(rand(1, 4), \true)),
            'description' => $fake->paragraph(rand(3, 8)),
            'author_id' => Author::factory(),
            'page_count' => rand(50, 800),
        ];
    }
}
