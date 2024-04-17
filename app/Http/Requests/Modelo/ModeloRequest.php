<?php

namespace App\Http\Requests\Modelo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModeloRequest extends FormRequest
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
            'marca_id' => [
                'required',
                'exists:marcas,id',
            ],
            'nome' => [
                'required',
                'min:3',
                'max:30'
            ],
            'imagem' => [
                'required',
                'file',
                'mimes:jpeg,jpg,png',
            ],
            'numero_portas' => [
                'required',
                'integer',
                'min:1',
            ],
            'lugares' => [
                'required',
                'integer',
                'min:1',
            ],
            'air_bag' => [
                'required',
                'boolean',
            ],
            'abs' => [
                'required',
                'boolean',
            ],
        ];

        if ($this->method() === 'PUT') {
            
            $rules['marca_id'] = [
                'nullable',
            ];

            $rules['nome'] = [
                'nullable',
                'min:3',
                'max:30',
                Rule::unique('modelos')->ignore($this->modelo)
            ];

            $rules['imagem'] = [
                'nullable',
                'file',
                'mimes:jpeg,jpg,png'
            ];

            $rules['numero_portas'] = [
                'nullable',
                'integer',
                'min:1',
            ];

            $rules['lugares'] = [
                'nullable',
                'integer',
                'min:1',
            ];

            $rules['air_bag'] = [
                'nullable',
                'boolean',
            ];

            $rules['abs'] = [
                'nullable',
                'boolean',
            ];
        }

        return $rules;
    }
}
