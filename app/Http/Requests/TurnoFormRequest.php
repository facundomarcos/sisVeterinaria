<?php

namespace sisVeterinaria\Http\Requests;

use sisVeterinaria\Http\Requests\Request;

class TurnoFormRequest extends Request
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
        
                    
            'paciente'=>'max:5',
            'fecha'=>'date',
            'hora_inicio'=>'max:5',
            'hora_finalizacion'=>'max:5',
            'descripcion'=>'max:250'
         
            
            
        ];
    }
}
