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
            'tempat_lahir' => 'Tanjungpinang',
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => 'Perempuan',
            'alamat' => $this->faker->address()
        ];
    }
}
