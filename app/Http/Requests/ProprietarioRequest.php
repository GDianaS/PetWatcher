<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProprietarioRequest extends FormRequest
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

'tipo' => 'required',
            'nome' => 'required|min:5|max:30',
            'cpf_ou_cnpj' => 'required',
'email' => 'required',
            'telefone' => 'required',
'endereco' => 'required',
                        
        ];
    }
}
