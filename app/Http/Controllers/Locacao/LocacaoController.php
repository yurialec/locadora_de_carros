<?php

namespace App\Http\Controllers\Locacao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Locacao\LocacaoRequest;
use App\Http\Resources\Locacao\LocacaoResource;
use App\Models\Locacao\Locacao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    public $locacao;
    public function __construct(Locacao $locacao)
    {
        $this->locacao = $locacao;
    }

    public function index(): JsonResponse
    {
        $locacoes = $this->locacao->paginate(10);
        $locacoesResource = LocacaoResource::collection($locacoes);

        if ($locacoesResource->isNotEmpty()) {
            return response()->json($locacoesResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    public function store(LocacaoRequest $request): JsonResponse
    {
        $locacao = Locacao::create([
            'cliente_id' => $request->cliente_id,
            'carro_id' => $request->carro_id,
            'data_inicio_periodo' => $request->data_inicio_periodo,
            'data_final_previsto_periodo' => $request->data_final_previsto_periodo,
            'valor_diaria' => $request->valor_diaria,
            'km_inicial' => $request->km_inicial,
            'km_final' => $request->km_final,
        ]);

        if ($locacao) {
            $clientesResource = new LocacaoResource($locacao);
            return response()->json($locacao, 201);
        } else {
            return response()->json(['Erro ao incluir registro', 204]);
        }
    }

    public function show(int $id): JsonResponse
    {
        $locacao = $this->locacao->find($id);

        if (!empty($locacao)) {
            $clientesResource = new LocacaoResource($locacao);
            return response()->json($clientesResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    public function update(LocacaoRequest $request, int $id): JsonResponse
    {
        $locacao = $this->locacao->find($id);

        if (!empty($locacao)) {

            $locacao->update([
                'cliente_id' => $request->cliente_id,
                'carro_id' => $request->carro_id,
                'data_inicio_periodo' => $request->data_inicio_periodo,
                'data_final_previsto_periodo' => $request->data_final_previsto_periodo,
                'data_final_realizado_periodo' => $request->data_final_realizado_periodo,
                'valor_diaria' => $request->valor_diaria,
                'km_inicial' => $request->km_inicial,
                'km_final' => $request->km_final,
            ]);

            if ($locacao) {
                $clientesResource = new LocacaoResource($locacao);
                return response()->json($clientesResource, 200);
            } else {
                return response()->json(['Erro ao atualizar registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        $locacao = $this->locacao->find($id);

        if ($locacao) {
            if ($locacao->delete()) {
                return response()->json(['Registro excluido com sucesso.', 200]);
            } else {
                return response()->json(['Erro ao excluir registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }
}
