<?php

namespace App\Http\Requests\Marca;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MarcaRequest extends FormRequest
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
        $rules = [
            'nome' => [
                'required',
                'min:3',
                'max:30'
            ],
            'imagem' => [
                'required',
                'max:100',
            ]
        ];

        if ($this->method() === 'PUT') {
            $rules['nome'] = [
                'nullable',
                'min:3',
                'max:30',
                Rule::unique('marcas')->ignore($this->marca)
            ];

            $rules['imagem'] = [
                'nullable',
                'max:100'
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve conter no máximo 30 caracteres.',
            'nome.unique' => 'Já existe um registro com esse nome.',
            'imagem.required' => 'O campo imagem é obrigatório.',
            'imagem.max' => 'O campo imagem deve conter no máximo 100 caracteres.',
        ];
    }
}
