<?php

namespace Database\Factories;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array
     */
    public function definition()
    {
        $config = [
            'table' => 'members',
            'field' => 'no_member',
            'length' => '8',
            'prefix' => date('y')
        ];

        return [
            'nama' => $this->faker->name(),
            'no_member' => IdGenerator::generate($config),
            'nis' => $this->faker->unique()->randomNumber(5, true),
            'tempat_lahir' => 'Tanjungpinang',
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => 'Perempuan',
            'alamat' => $this->faker->address()
        ];
    }
}
