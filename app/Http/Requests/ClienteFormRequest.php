<?php

namespace sisVeterinaria\Http\Requests;

use sisVeterinaria\Http\Requests\Request;

class ClienteFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'dni'=>'max:9', 
    	'nombres'=>'required|max:45',
        'apellido'=>'required|max:45',
        'localidad'=>'required|max:45',
        'calle'=>'max:45',
        'altura'=>'numeric',
        'telefono_area'=>'max:6',
        'telefono_numero'=>'max:12',
        'correo'=>'max:45',
        'comentarios'=>'max:200'
     
        
        ];
    }
}
