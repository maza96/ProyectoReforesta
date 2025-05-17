<?php

namespace Database\Seeders;

use App\Models\Especie;
use App\Models\Evento;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Especie::factory()
        //         ->count(1)
        //         ->hasAttached(Evento::factory()->count(1), ['cantidad' => 12])
        //         ->create();

        Especie::create([
                'nombre_cientifico' => 'Quercus robur',
                'descripcion' => 'También conocido como roble común, es un árbol caducifolio de gran tamaño.',
                'clima' => 'Templado',
                'region' => 'Europa',
                'tiempo_adulto' => 50,
                'enlace' => 'https://es.wikipedia.org/wiki/Quercus_robur',
        ]);

        Especie::create([
                'nombre_cientifico' => 'Pinus sylvestris',
                'descripcion' => 'Pino silvestre de rápido crecimiento, común en bosques templados.',
                'clima' => 'Frío',
                'region' => 'Eurasia',
                'tiempo_adulto' => 30,
                'enlace' => 'https://es.wikipedia.org/wiki/Pinus_sylvestris',
        ]);

        Especie::create([
            'nombre_cientifico' => 'Betula pendula',
                'descripcion' => 'Conocido como abedul blanco, se encuentra en zonas templadas y boreales.',
                'clima' => 'Templado-Frío',
                'region' => 'Europa y Asia',
                'tiempo_adulto' => 25,
                'enlace' => 'https://es.wikipedia.org/wiki/Betula_pendula',
        ]);

        Especie::create([
                'nombre_cientifico' => 'Eucalyptus globulus',
                'descripcion' => 'Árbol de crecimiento rápido usado en la industria maderera y papelera.',
                'clima' => 'Mediterráneo',
                'region' => 'Australia',
                'tiempo_adulto' => 20,
                'enlace' => 'https://es.wikipedia.org/wiki/Eucalyptus_globulus',
        ]);

        Especie::create([
                'nombre_cientifico' => 'Sequoia sempervirens',
                'descripcion' => 'Conocido como secuoya roja, puede alcanzar más de 100 metros de altura.',
                'clima' => 'Templado húmedo',
                'region' => 'América del Norte',
                'tiempo_adulto' => 100,
                'enlace' => 'https://es.wikipedia.org/wiki/Sequoia_sempervirens',
        ]);

        DB::table('beneficios')->insert([
                [
                    'especie_id' => 1,
                    'beneficio_id' => 1,
                    'descripcion' => 'Aumenta la biodiversidad'
                ],
                [
                    'especie_id' => 1,
                    'beneficio_id' => 2,
                    'descripcion' => 'Reduce la erosión del suelo'
                ],
                [
                    'especie_id' => 2,
                    'beneficio_id' => 1,
                    'descripcion' => 'Aumenta la biodiversidad'
                ],
                [
                    'especie_id' => 2,
                    'beneficio_id' => 3,
                    'descripcion' => 'Proporciona sombra'
                ],
                [
                    'especie_id' => 3,
                    'beneficio_id' => 1,
                    'descripcion' => 'Aumenta la biodiversidad'
                ],
                [
                    'especie_id' => 3,
                    'beneficio_id' => 4,
                    'descripcion' => 'Mejora la calidad del aire'
                ],
                [
                    'especie_id' => 4,
                    'beneficio_id' => 2,
                    'descripcion' => 'Reduce la erosión del suelo'
                ],
                [
                    'especie_id' => 4,
                    'beneficio_id' => 5,
                    'descripcion' => 'Proporciona madera'
                ],
                [
                    'especie_id' => 5,
                    'beneficio_id' => 3,
                    'descripcion' => 'Proporciona sombra'
                ],
                [
                    'especie_id' => 5,
                    'beneficio_id' => 1,
                    'descripcion' => 'Aumenta la biodiversidad'
                ],
            ]);
    }
}
