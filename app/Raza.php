<?php

namespace sisVeterinaria;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    protected $table='raza';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable =[
        'especie',
        'clase',
        'subclase'

    ];

    protected $guarded=[

    ];
}
