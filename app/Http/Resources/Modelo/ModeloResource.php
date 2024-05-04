<?php

namespace App\Http\Resources\Modelo;

use App\Http\Resources\Marca\MarcaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ModeloResource extends JsonResource
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
            'marca_id' => $this->marca_id,
            'nome' => $this->nome,
            'imagem' => $this->imagem,
            'numero_portas' => $this->numero_portas,
            'lugares' => $this->lugares,
            'air_bag' => $this->air_bag,
            'abs' => $this->abs,
            'marca' => $this->marca,
            'carros' => $this->carros,
        ];
    }
}
