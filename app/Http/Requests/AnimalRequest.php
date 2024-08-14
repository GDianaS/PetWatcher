<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
            'cpf_ou_cnpj' => 'required|cpf_ou_cnpj',
            'tipo_aquisicao' => 'required',
            'nome' => 'required',
            'codigo_microchip' => 'required|unique:animals',
            'fase' => 'required',
            'especie' => 'required',
            'data_nascimento' => 'required',
            'porte' => 'required',
            // 'has_pedigree' => 'required',
        ];
    }
}
