<?php

namespace sisVeterinaria;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table='paciente';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	
    	'nombres',
        'raza',
        'sexo',
        'tamanio',
        'peso',
        'talla',
        'cliente',
        'responsable',
        'imagen',
        'activo'

    ];
    
    protected $guarded =[

    ];

}
