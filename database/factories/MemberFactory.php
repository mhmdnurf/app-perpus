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
            'nama' => $this->faker->name(),
            'nis' => $this->faker->unique()->randomNumber(5, true),
            'tempat_lahir' => $this->faker->word(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->word(),
            'kelas' => $this->faker->numberBetween(1, 6),
            'alamat' => $this->faker->address()
        ];
    }
}
