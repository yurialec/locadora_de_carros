<?php

namespace App\Http\Controllers\Marca;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marca\MarcaRequest;
use App\Http\Resources\Marca\MarcaResource;
use App\Models\Marca\Marca;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function index(Request $request): JsonResponse
    {
        $query = $this->marca->query();

        if ($request->has('search')) {
            $searchTerm = $request->query('search');
            $query->where('nome', 'like', '%' . $searchTerm . '%');
        }

        $marcas = $query->paginate(10);
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
        $imagem = $request->imagem;
        $imagem_urn = $imagem->store('imagens/marcas', 'public');

        $marca = Marca::create([
            'nome' => $request->nome,
            'imagem' => $imagem_urn,
        ]);

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
        $imagem = $request->imagem;
        $imagem_urn = $imagem->store('imagens/marcas', 'public');

        $marca = $this->marca->find($id);

        if ($request->imagem) {
            Storage::disk('public')->delete($marca->imagem);
        }

        if (!empty($marca)) {

            $marca->update([
                'nome' => $request->nome,
                'imagem' => $imagem_urn,
            ]);

            if ($marca) {
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
    public function delete(int $id): JsonResponse
    {
        $marca = $this->marca->find($id);
        Storage::disk('public')->delete($marca->imagem);

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
