<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'CPF' => 'required|unique:funcionarios|cpf',
            'nome' => 'required',
            'telefone' => 'required|celular_com_ddd',
            'email' => 'required|email',
            'endereco' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'CPF.cpf' => 'O campo CPF não é um CPF válido',
        ];
    }
}
