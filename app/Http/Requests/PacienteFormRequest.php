<?php

namespace sisVeterinaria\Http\Requests;

use sisVeterinaria\Http\Requests\Request;

class PacienteFormRequest extends Request
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
    	'nombres'=>'required|max:45',
        'raza'=>'required',
        'sexo'=>'required|max:10',
        'tamanio'=>'max:15',
        'peso'=>'numeric',
        'talla'=>'max:3',
        'cliente'=>'required',
        'responsable'=>'max:45',
        'imagen'=>'mimes:jpeg,bmp,png'
        ];
    }
}
