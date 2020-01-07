<?php

namespace sisVeterinaria;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primaryKey='dni';

    public $timestamps=false;


    protected $fillable =[
    	
    	'nombres',
        'apellido',
        'localidad',
        'calle',
        'altura',
        'telefono_area',
        'telefono_numero',
        'correo',
        'comentarios',
        'activo'

    ];
    
    protected $guarded =[

    ];
}
