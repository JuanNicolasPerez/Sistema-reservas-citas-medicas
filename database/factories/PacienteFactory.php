<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nombres' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'dni' => $this->faker->unique()->numerify('########'),
            'numero_seguro' => $this->faker->unique()->numerify('########'),
            'fecha_nacimiento' => $this->faker->date('Y-d-m', '2020-01-01'),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'celular' => $this->faker->phoneNumber,
            'correo' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
            'grupo_sanguinio' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', '0-']),
            'alergias' => $this->faker->word(3,true),
            'contacto_emergencia' => $this->faker->phoneNumber,
            'observacion' => $this->faker->word(3,true),

        ];
    }
}
