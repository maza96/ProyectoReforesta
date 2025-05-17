<?php

namespace Database\Factories;

use App\Models\Especie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Especie>
 */
class EspecieFactory extends Factory
{
    protected $model = Especie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_cientifico' => $this->faker->unique()->word(),
            'descripcion' => $this->faker->paragraph(3),
            'clima' => $this->faker->paragraph(3),
            'region' => $this->faker->paragraph(3),
            'tiempo_adulto' => $this->faker->numberBetween(0, 100),
            'foto' => $this->faker->imageUrl(800, 600, 'nature'),
            'enlace' => $this->faker->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
