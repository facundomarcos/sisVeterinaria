<?php

namespace sisVeterinaria;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table='turno';
    
    protected $primaryKey='id';
    
    public $timestamps=false;
    
    protected $fillable=[
        'paciente',
        'fecha',
        'hora_inicio',
        'hora_finalizacion',
        'descripcion',
        'estado'
    ];
    protected $guarded=[
        
    ];
}
