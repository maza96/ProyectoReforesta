<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'fecha',
        'ubicacion',
        'tipo_evento',
        'tipo_terreno',
        'descripcion',
        'anfitrion_id',
        'archivo',
    ];

    //Relacion muchos a muchos con Usuario donde se guarda la relacion en la tabla evento_usuario
    public function participantes() {
        return $this->belongsToMany(Usuario::class);
    }

    //Relacion muchos a uno con Usuario donde se guarda la relacion en la tabla eventos
    public function anfitrion() {
        return $this->belongsTo(Usuario::class,'anfitrion_id');
    }

    //Relacion muchos a muchos con Especie donde se guarda la relacion en la tabla especie_evento
    public function especies() {
        return $this->belongsToMany(Especie::class,'especie_evento','evento_id','especie_id')->withPivot('cantidad');
    }
    
}
