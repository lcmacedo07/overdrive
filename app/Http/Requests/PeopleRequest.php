<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
			'name' => 'required|max:120',
			'document' => 'required|max:14|unique:peoples,document'.$this->id,
			'phone' => 'required|unique:peoples,phone'.$this->id,
			// 'status' => 'required|max:1 ',
			'user' => 'required|max:120|unique:peoples,user'.$this->id,
             
        ];
    }

    public function messages()
    {
        return [
            
			'name.required' => 'NOME nao foi selecionado.',
			'name.max' => 'NOME deve ter no maximo :max caracteres.',
			'document.required' => 'DOCUMENTO nao foi selecionado.',
			'document.max' => 'DOCUMENTO deve ter no maximo :max caracteres.',
			'document.unique' => ' Ja existe DOCUMENTO com esse valor.',
			'phone.required' => 'TELEFONE nao foi selecionado.',
			'phone.numeric' => 'TELEFONE deve ser numerico.',
			'phone.unique' => ' Ja existe TELEFONE com esse valor.',
			'status.required' => 'STATUS nao foi selecionado.',
			'status.max' => 'STATUS deve ter no maximo :max caracteres.',
			'user.required' => 'USUARIO nao foi selecionado.',
			'user.max' => 'USUARIO deve ter no maximo :max caracteres.',
			'user.unique' => ' Ja existe USUARIO com esse valor.',
             
        ];
    }
}
