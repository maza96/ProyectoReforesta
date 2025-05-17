<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    public $table = "beneficios";

    //Relacion muchos a uno con Especie donde se guarda la relacion en la tabla beneficios
    public function especie() {
        return $this->belongsTo(Especie::class, "especie_id");
    }
}
