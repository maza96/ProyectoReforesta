<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;
    protected $table = "especies";

    protected $fillable = [
        "nombre_cientifico",
        "descripcion",
        "clima",
        "region",
        "tiempo_adulto",
        "foto",
        "enlace"
    ];

    //Relacion muchos a muchos con Evento donde se guarda la relacion en la tabla especie_evento
    public function eventos() {
        return $this->belongsToMany(Evento::class)->withPivot("cantidad");
    }

}
