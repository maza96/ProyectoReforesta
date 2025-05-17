<?php

namespace Database\Seeders;

use App\Models\Especie;
use App\Models\Evento;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Evento::factory()
        //     ->count(5)
        //     ->has(Usuario::factory()->count(2), 'participantes')
        //     ->create();

        // Evento::factory()
        //     ->count(2)
        //     ->hasAttached(Especie::factory()->count(2),
        //     ['cantidad' => 11]
        //     )->create();

        // Evento::factory()
        //     ->count(1)
        //     ->for(Usuario::factory()->state([
        //         'nombre' => 'NombrePrueba'
        //     ]), 'anfitrion')
        //     ->create();

        Evento::create([
                'nombre' => 'Reforestación en el parque',
                'fecha' => '2021-12-15',
                'ubicacion' => 'Calle de la Música, 1',
                'tipo_evento' => 'Reforestación',
                'tipo_terreno'=> 'Ladera',
                'descripcion'=> 'Evento para reforestar la ladera del parque',
                'anfitrion_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
        ]);

        Evento::create([
            'nombre' => 'Limpieza de playa',
            'fecha' => '2022-01-20',
            'ubicacion' => 'Playa del Sol',
            'tipo_evento' => 'Limpieza',
            'tipo_terreno'=> 'Playa',
            'descripcion'=> 'Evento para limpiar la playa del sol',
            'anfitrion_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),    
        ]);

        Evento::create([
            'nombre' => 'Plantación de árboles',
            'fecha' => '2022-03-10',
            'ubicacion' => 'Parque Central',
            'tipo_evento' => 'Plantación',
            'tipo_terreno'=> 'Plano',
            'descripcion'=> 'Evento para plantar árboles en el parque central',
            'anfitrion_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),    
        ]);

        Evento::create([
            'nombre' => 'Jornada de reciclaje',
            'fecha' => '2022-05-05',
            'ubicacion' => 'Centro Comunitario',
            'tipo_evento' => 'Reciclaje',
            'tipo_terreno'=> 'Urbano',
            'descripcion'=> 'Evento para promover el reciclaje en la comunidad',
            'anfitrion_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),    
        ]);

        Evento::create([
            'nombre' => 'Conferencia sobre medio ambiente',
            'fecha' => '2022-07-15',
            'ubicacion' => 'Auditorio Municipal',
            'tipo_evento' => 'Conferencia',
            'tipo_terreno'=> 'Interior',
            'descripcion'=> 'Conferencia para discutir temas medioambientales',
            'anfitrion_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),    
        ]);
    }
}
