<?php

namespace App\Http\Requests\Locacao;

use Illuminate\Foundation\Http\FormRequest;

class LocacaoRequest extends FormRequest
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
            'cliente_id' => [
                'required',
                'boolean',
            ],
            'carro_id' => [
                'required',
                'boolean',
            ],
            'data_inicio_periodo' => [
                'required',
                'date',
            ],
            'data_final_previsto_periodo' => [
                'required',
                'date',
                'after_or_equal:data_inicio_periodo',
            ],
            'data_final_realizado_periodo' => [
                'nullable',
                'date',
            ],
            'valor_diaria' => [
                'required',
                'integer',
            ],
            'km_inicial' => [
                'required',
                'integer',
            ],
            'km_final' => [
                'nullable',
                'integer',
            ],
        ];

        if ($this->method() === 'PUT') {
            $rules['cliente_id'] = [
                'nullable',
                'boolean',
            ];
            $rules['carro_id'] = [
                'nullable',
                'boolean',
            ];
            $rules['data_inicio_periodo'] = [
                'nullable',
                'date',
            ];
            $rules['data_final_previsto_periodo'] = [
                'nullable',
                'date',
                'after_or_equal:data_inicio_periodo',
            ];
            $rules['data_final_realizado_periodo'] = [
                'nullable',
                'date',
            ];
            $rules['valor_diaria'] = [
                'nullable',
                'integer',
            ];
            $rules['km_inicial'] = [
                'nullable',
                'integer',
            ];
            $rules['km_final'] = [
                'nullable',
                'integer',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'O campo cliente é obrigatório.',
            'cliente_id.boolean' => 'O formato do campo(cliente) está inválido.',

            'carro_id.required' => 'O campo carro é obrigatório.',
            'carro_id.boolean' => 'O formato do campo(carro) está inválido.',

            'data_inicio_periodo.required' => 'O campo início do período é obrigatório.',
            'data_inicio_periodo.date' => 'O formato do campo(data início) está inválido.',

            'data_final_previsto_periodo.required' => 'O campo data final prevista é obrigatório.',
            'data_final_previsto_periodo.date' => 'O formato do campo(data final prevista) está inválido.',
            'data_final_previsto_periodo.after_or_equal' => 'O campo(data final prevista) deve ser maior que a data de início.',

            'data_final_realizado_periodo.required' => 'O campo data de entrega é obrigatório.',
            'data_final_realizado_periodo.date' => 'O formato do campo(data de entrega) está inválido.',
            'data_final_realizado_periodo.after_or_equal' => 'O campo(data de entrega) deve ser maior que a data de início.',

            'valor_diaria.required' => 'O campo valor diária é obrigatório',

            'km_inicial.required' => 'O campo km inicial é obrigatório',
            'km_inicial.integer' => 'O campo km inicial deve conter somente números',

            'km_final.required' => 'O campo km final é obrigatório',
            'km_final.after_or_equal' => 'O campo km final deve conter somente números',
        ];
    }
}
