<?php

namespace sisVeterinaria;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $table='especie';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable =[
        'especie',
        'activo',
      

    ];

    protected $guarded=[

    ];
}
