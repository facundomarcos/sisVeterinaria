<?php

namespace sisVeterinaria\Http\Requests;

use sisVeterinaria\Http\Requests\Request;

class AtencionVeterinariaFormRequest extends Request
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
        
            'descripcion'=>'required|max:240',
            'paciente'=>'required',
            'veterinario'=>'required',
            'diagnostico'=>'max:200',
            'tratamiento'=>'max:200'
        ];
    }
}
