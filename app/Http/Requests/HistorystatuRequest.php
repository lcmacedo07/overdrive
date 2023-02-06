<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorystatuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
			'people_id' => 'required|numeric',
			'status' => 'required|max:1',
             
        ];
    }

    public function messages()
    {
        return [
            
			'people_id.required' => 'PESSOAS nao foi preenchido/selecionado.',
			'people_id.numeric' => 'PESSOAS deve ser numerico.',
			'status.required' => 'STATUS nao foi selecionado.',
			'status.max' => 'STATUS deve ter no maximo :max caracteres.',
             
        ];
    }
}
