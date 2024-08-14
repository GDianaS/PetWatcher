<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCredenciadaRequest extends FormRequest
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
            'Inscriçao_Estadual' => 'required|uf',
            'email' => 'required|email',
            'Razao_Social' => 'required',
            'telefone' => 'required|celular_com_ddd',
            'endereço' => 'required',
        ];
    }
}
