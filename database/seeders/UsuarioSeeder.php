<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Juan',
            'apellidos' => 'Perez',
            'nick' => 'juanperez',
            'email' => 'juan.perez@example.com',
            'password' => Hash::make('password123'), // Hashear la contraseña
            'karma' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Usuario::create([
            'nombre' => 'Maria',
            'apellidos' => 'Gomez',
            'nick' => 'mariagomez',
            'email' => 'maria.gomez@example.com',
            'password' => Hash::make('password123'), // Hashear la contraseña
            'karma' => 20,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Usuario::create([
            'nombre' => 'Carlos',
            'apellidos' => 'Lopez',
            'nick' => 'carloslopez',
            'email' => 'carlos.lopez@example.com',
            'password' => Hash::make('password123'), // Hashear la contraseña
            'karma' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Usuario::create([
            'nombre' => 'Ana',
            'apellidos' => 'Martinez',
            'nick' => 'anamartinez',
            'email' => 'ana.martinez@example.com',
            'password' => Hash::make('password123'), // Hashear la contraseña
            'karma' => 40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Usuario::create([
            'nombre' => 'Luis',
            'apellidos' => 'Fernandez',
            'nick' => 'luisfernandez',
            'email' => 'luis.fernandez@example.com',
            'password' => Hash::make('password123'), // Hashear la contraseña
            'karma' => 50,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
