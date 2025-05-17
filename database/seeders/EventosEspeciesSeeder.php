<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventosEspeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('especie_evento')->insert([
            ['evento_id' => 1,'especie_id' => 1, 'cantidad' => 10],
            ['evento_id' => 1,'especie_id' => 2, 'cantidad' => 15],
            ['evento_id' => 1,'especie_id' => 3, 'cantidad' => 20],
            ['evento_id' => 2,'especie_id' => 4, 'cantidad' => 25],
            ['evento_id' => 2,'especie_id' => 5, 'cantidad' => 30],
            ['evento_id' => 2,'especie_id' => 1, 'cantidad' => 35],
            ['evento_id' => 3,'especie_id' => 2, 'cantidad' => 40],
            ['evento_id' => 3,'especie_id' => 3, 'cantidad' => 45],
            ['evento_id' => 3,'especie_id' => 4, 'cantidad' => 50],
            ['evento_id' => 4,'especie_id' => 5, 'cantidad' => 55],
            ['evento_id' => 4,'especie_id' => 1, 'cantidad' => 60],
            ['evento_id' => 4,'especie_id' => 2, 'cantidad' => 65],
            ['evento_id' => 5,'especie_id' => 1, 'cantidad' => 70],
            ['evento_id' => 5,'especie_id' => 2, 'cantidad' => 75],
            ['evento_id' => 5,'especie_id' => 3, 'cantidad' => 80],
            ['evento_id' => 5,'especie_id' => 4, 'cantidad' => 85],
            ['evento_id' => 5,'especie_id' => 5, 'cantidad' => 90],
        ]);
    }
}
