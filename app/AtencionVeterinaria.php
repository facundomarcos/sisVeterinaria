<?php

namespace sisVeterinaria;

use Illuminate\Database\Eloquent\Model;

class AtencionVeterinaria extends Model
{
    protected $table='atencionv';
    
    protected $primaryKey='id';
    
    public $timestamps=false;
    
    protected $fillable=[
        'fecha_hora',
        'descripcion',
        'paciente',
        'veterinario',
        'diagnostico',
        'tratamiento'
    ];
    protected $guarded=[
        
    ];
}
