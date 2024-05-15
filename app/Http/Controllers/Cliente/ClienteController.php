<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\ClienteRequest;
use App\Http\Resources\Cliente\ClienteResource;
use App\Models\Cliente\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request): JsonResponse
    {
        $query = $this->cliente->query();
        if ($request->has('search')) {
            $searchTerm = $request->query('search');
            $query->where('nome', 'like', '%' . $searchTerm . '%');
        }

        $clientes = $query->paginate(10);
        $clientesResource = ClienteResource::collection($clientes);

        if ($clientesResource->isNotEmpty()) {
            return response()->json($clientesResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    public function store(ClienteRequest $request): JsonResponse
    {
        $cliente = Cliente::create([
            'nome' => $request->nome,
        ]);

        if ($cliente) {
            $clientesResource = new ClienteResource($cliente);
            return response()->json($cliente, 201);
        } else {
            return response()->json(['Erro ao incluir registro', 204]);
        }
    }

    public function show(int $id): JsonResponse
    {
        $cliente = $this->cliente->find($id);

        if (!empty($cliente)) {
            $clientesResource = new ClienteResource($cliente);
            return response()->json($clientesResource, 200);
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }

    public function update(ClienteRequest $request, int $id): JsonResponse
    {
        $cliente = $this->cliente->find($id);

        if (!empty($cliente)) {

            $cliente->update([
                'nome' => $request->nome,
            ]);

            if ($cliente) {
                $clientesResource = new ClienteResource($cliente);
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
        $cliente = $this->cliente->find($id);

        if ($cliente) {
            if ($cliente->delete()) {
                return response()->json(['Registro excluido com sucesso.', 200]);
            } else {
                return response()->json(['Erro ao excluir registro.', 204]);
            }
        } else {
            return response()->json(['Nenhum resultado encontrado.', 204]);
        }
    }
}
