<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosEventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evento_usuario')->insert([
            ['usuario_id' => 1,'evento_id' => 1],
            ['usuario_id' => 2,'evento_id' => 1],
            ['usuario_id' => 3,'evento_id' => 1],
            ['usuario_id' => 5,'evento_id' => 1],
            ['usuario_id' => 5,'evento_id' => 2],
            ['usuario_id' => 2,'evento_id' => 2],
            ['usuario_id' => 3,'evento_id' => 2],
            ['usuario_id' => 4,'evento_id' => 2],
            ['usuario_id' => 1,'evento_id' => 3],
            ['usuario_id' => 2,'evento_id' => 3],
            ['usuario_id' => 3,'evento_id' => 3],
            ['usuario_id' => 4,'evento_id' => 3],
            ['usuario_id' => 1,'evento_id' => 4],
            ['usuario_id' => 2,'evento_id' => 4],
            ['usuario_id' => 3,'evento_id' => 4],
            ['usuario_id' => 4,'evento_id' => 4],
        ]);
    }
}
