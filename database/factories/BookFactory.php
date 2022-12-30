<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'category_id' => 2,
            // 'rack_id' => 1,
            // 'isbn' => $this->faker->randomNumber(9, true),
            // 'judul' => $this->faker->words(),
            // 'penerbit' => $this->faker->address(),
            // 'pengarang' => $this->faker->name(),
            // 'tahun' => $this->faker->year(),
            // 'jumlah' => 10,
            // 'stok' => 10

            'category_id' => $this->faker->numberBetween(1, 3),
            'rack_id' => $this->faker->numberBetween(1, 3),
            'isbn' => $this->faker->unique()->randomNumber(5, true),
            'judul' => $this->faker->word(),
            'penerbit' => $this->faker->word(),
            'pengarang' => $this->faker->name(),
            'tahun' => $this->faker->year(),
            'jumlah' => 10,
            'stok' => 10
        ];
    }
}
