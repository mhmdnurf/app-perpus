<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'nis' => $this->faker->unique()->randomNumber(5, true),
            'tempat-lahir' => $this->faker->word(),
            'tanggal-lahir' => $this->faker->date(),
            'jenis-kelamin' => $this->faker->word(),
            'kelas' => $this->faker->numberBetween(1, 6),
            'alamat' => $this->faker->address()
        ];
    }
}
