<?php

namespace App\Http\Controllers\Modelo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modelo\ModeloRequest;
use App\Http\Resources\Modelo\ModeloResource;
use App\Models\Modelo\Modelo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModeloController extends Controller
{
    public $modelo;
    public function __construct(Modelo $modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * Listar Modelos
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $modelos = $this->modelo->paginate(10);
        $modelosResource = ModeloResource::collection($modelos);

        if ($modelosResource->isNotEmpty()) {
            return response()->json($modelosResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    /**
     * Cadastrar Modelo
     *
     * @param ModeloRequest $request
     * @return JsonResponse
     */
    public function store(ModeloRequest $request): JsonResponse
    {
        $imagem = $request->imagem;
        $imagem_urn = $imagem->store('imagens/modelos', 'public');

        $modelo = Modelo::create([
            'nome' => $request->nome,
            'imagem' => $imagem_urn,
            'marca_id' => $request->marca_id,
            'numero_portas' => $request->numero_portas,
            'lugares' => $request->lugares,
            'air_bag' => $request->air_bag,
            'abs' => $request->abs,
        ]);

        if ($modelo) {
            $modeloResource = new ModeloResource($modelo);
            return response()->json($modelo, 201);
        } else {
            return response()->json(['Erro ao incluir registro', 204]);
        }
    }

    /**
     * Detalhes do modelo
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $modelo = $this->modelo->find($id);

        if (!empty($modelo)) {
            $modeloResource = new ModeloResource($modelo);
            return response()->json($modeloResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    /**
     * Atualizar modelo
     *
     * @param ModeloRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(ModeloRequest $request, int $id): JsonResponse
    {
        $imagem = $request->imagem;
        $imagem_urn = $imagem->store('imagens/modelos', 'public');

        $modelo = $this->modelo->find($id);

        if ($request->imagem) {
            Storage::disk('public')->delete($modelo->imagem);
        }

        if (!empty($modelo)) {

            $modelo->update([
                'nome' => $request->nome,
                'imagem' => $imagem_urn,
                'marca_id' => $request->marca_id,
                'numero_portas' => $request->numero_portas,
                'lugares' => $request->lugares,
                'air_bag' => $request->air_bag,
                'abs' => $request->abs,
            ]);

            if ($modelo) {
                $modeloResource = new ModeloResource($modelo);
                return response()->json($modeloResource, 200);
            } else {
                return response()->json(['Erro ao atualizar registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    /**
     * Deletar Modelo
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $modelo = $this->modelo->find($id);
        Storage::disk('public')->delete($modelo->imagem);

        if ($modelo) {
            if ($modelo->delete()) {
                return response()->json(['Registro excluido com sucesso.', 200]);
            } else {
                return response()->json(['Erro ao excluir registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }
}
