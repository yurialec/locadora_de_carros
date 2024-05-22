<?php

namespace App\Http\Resources\Locacao;

use Illuminate\Http\Resources\Json\JsonResource;

class LocacaoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cliente_id' => $this->cliente_id,
            'carro_id' => $this->carro_id,
            'data_inicio_periodo' => $this->data_inicio_periodo,
            'data_final_previsto_periodo' => $this->data_final_previsto_periodo,
            'data_final_realizado_periodo' => $this->data_final_realizado_periodo,
            'valor_diaria' => $this->valor_diaria,
            'km_inicial' => $this->km_inicial,
            'km_final' => $this->km_final,
            'cliente' => $this->cliente,
            'carro' => $this->carro,
        ];
    }
}
