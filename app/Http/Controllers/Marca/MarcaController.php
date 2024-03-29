<?php

namespace App\Http\Controllers\Marca;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marca\MarcaRequest;
use App\Http\Resources\Marca\MarcaResource;
use App\Models\Marca\Marca;
use Illuminate\Http\JsonResponse;

class MarcaController extends Controller
{
    public $marca;
    public function __construct(Marca $marca)
    {
        $this->marca = $marca;
    }

    /**
     * Listar Marcas
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $marcas = $this->marca->paginate(10);
        $marcasResource = MarcaResource::collection($marcas);

        if ($marcasResource->isNotEmpty()) {
            return response()->json($marcasResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    /**
     * Cadastrar nova marca
     *
     * @param MarcaRequest $request
     * @return JsonResponse
     */
    public function store(MarcaRequest $request): JsonResponse
    {
        $marca = Marca::create($request->all());

        if ($marca) {
            $marcaResource = new MarcaResource($marca);
            return response()->json($marca, 201);
        } else {
            return response()->json(['Erro ao incluir registro', 204]);
        }
    }

    /**
     * Mostrar detalhes da marca
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $marca = $this->marca->find($id);

        if (!empty($marca)) {
            $marcaResource = new MarcaResource($marca);
            return response()->json($marcaResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    /**
     * Atualizar Marca
     *
     * @param MarcaRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(MarcaRequest $request, int $id): JsonResponse
    {
        $marca = $this->marca->find($id);

        if (!empty($marca)) {
            if ($marca->update($request->all())) {
                $marcaResource = new MarcaResource($marca);
                return response()->json($marcaResource, 200);
            } else {
                return response()->json(['Erro ao atualizar registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    /**
     * Excluir Marca
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $marca = $this->marca->find($id);

        if ($marca) {
            if ($marca->delete()) {
                return response()->json(['Registro excluido com sucesso.', 200]);
            } else {
                return response()->json(['Erro ao excluir registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }
}
