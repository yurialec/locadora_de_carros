<?php

namespace App\Http\Resources\Marca;

use App\Http\Resources\Modelo\ModeloResource;
use App\Models\Modelo\Modelo;
use Illuminate\Http\Resources\Json\JsonResource;

class MarcaResource extends JsonResource
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
            'nome' => $this->nome,
            'imagem' => $this->imagem,
            'modelos' => $this->modelos,
        ];
    }
}
