<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'nick',
        'apellidos',
        'karma',
        'avatar'
    ];
    
    protected $hidden = [
        'password',
        //'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Relacion muchos a muchos con Evento donde se guarda la relacion en la tabla evento_usuario
    public function eventosParticipados() {
        return $this->belongsToMany(Evento::class);
    }


    //Relacion uno a muchos con Evento donde se guarda la relacion en la tabla eventos
    public function eventosPropuestos() {
        return $this->hasMany(Evento::class,'anfitrion_id');
    }
}
