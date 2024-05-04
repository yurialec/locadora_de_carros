<?php

namespace App\Http\Controllers\Carro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carro\CarroRequest;
use App\Http\Resources\Carro\CarroResource;
use App\Models\Carro\Carro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public $carro;
    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
    }

    public function index(): JsonResponse
    {
        $carros = $this->carro->paginate(10);
        $carrosResource = CarroResource::collection($carros);

        if ($carrosResource->isNotEmpty()) {
            return response()->json($carrosResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    public function store(CarroRequest $request): JsonResponse
    {
        $carro = Carro::create([
            'modelo_id' => $request->modelo_id,
            'placa' => $request->placa,
            'disponivel' => $request->disponivel,
            'km' => $request->km,
        ]);

        if ($carro) {
            $carrosResource = new CarroResource($carro);
            return response()->json($carro, 201);
        } else {
            return response()->json(['Erro ao incluir registro', 204]);
        }
    }

    public function show(int $id): JsonResponse
    {
        $carro = $this->carro->find($id);

        if (!empty($carro)) {
            $carrosResource = new CarroResource($carro);
            return response()->json($carrosResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    public function update(CarroRequest $request, int $id): JsonResponse
    {
        $carro = $this->carro->find($id);

        if (!empty($carro)) {

            $carro->update([
                'modelo_id' => $request->modelo_id,
                'disponivel' => $request->disponivel,
                'km' => $request->km,
            ]);

            if ($carro) {
                $carrosResource = new CarroResource($carro);
                return response()->json($carrosResource, 200);
            } else {
                return response()->json(['Erro ao atualizar registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        $carro = $this->carro->find($id);

        if ($carro) {
            if ($carro->delete()) {
                return response()->json(['Registro excluido com sucesso.', 200]);
            } else {
                return response()->json(['Erro ao excluir registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }
}
