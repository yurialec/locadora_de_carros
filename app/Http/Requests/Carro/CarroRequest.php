<?php

namespace App\Http\Requests\Carro;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarroRequest extends FormRequest
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
            'modelo_id' => [
                'required',
                'exists:modelos,id',
            ],
            'placa' => [
                'required',
            ],
            'disponivel' => [
                'required',
                'boolean'
            ],
            'km' => [
                'required',
                'integer',
            ],
        ];

        if ($this->method() === 'PUT') {

            $rules['modelo_id'] = [
                'nullable',
                'exists:modelos,id',
            ];

            $rules['placa'] = [
                'nullable',
                Rule::unique('carros')->ignore($this->carro)
            ];

            $rules['disponivel'] = [
                'nullable',
                'boolean'
            ];

            $rules['km'] = [
                'nullable',
                'integer',
            ];
        }

        return $rules;
    }
}
