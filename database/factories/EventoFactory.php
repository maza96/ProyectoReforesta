<?php

namespace Database\Factories;

use App\Models\Usuario;
use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    protected $model = Evento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'fecha' => $this->faker->dateTimeBetween('now','+1 year'),
            'ubicacion' => $this->faker->address(),
            'tipo_evento' => $this->faker->randomElement(['Excursion', 'Charla', 'Taller', 'Conferencia']),
            'tipo_terreno' => $this->faker->randomElement(['Montaña', 'Playa', 'Bosque', 'Desierto']),
            'descripcion' => $this->faker->paragraph(3),
            'imagen' => $this->faker->imageUrl(800, 600, 'nature'),
            'anfitrion_id' => Usuario::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
