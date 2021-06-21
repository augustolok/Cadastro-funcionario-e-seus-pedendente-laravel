<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class funcionarioRequest extends FormRequest
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
            'nome'=>'required|min:3',
            'datanacimento'=>'required',
            'foto' => 'required',
            'email' => 'email:rfc,dns'
            
        
        ];
    }
     public function messages(){
        return [
            'nome.required'=>' Campo não pode estar vazio',
            'nome.min'=>' Campo tem que ter mais 3 caracteres ',
            'datanacimento.required'=>' Campo não pode estar vazio',
            'email.required'=>' Campo não pode estar vazio',
            'email.email'=>' por favor informar email valido',
            
        ];
     }
}
