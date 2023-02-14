<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function containsName(Request $request): JsonResponse
    {
        try {
            $queryParams = $request->only(['name']);

            if (empty($queryParams['name']))
                return $this->sendResponse([]);
            
            $clientes = Cliente::query()
                ->where('nome', 'ilike', "%{$queryParams['name']}%")
                ->orderBy("nome")
                ->limit(30)
                ->get();
            return $this->sendResponse($clientes);
        } catch (Exception $e) {
            return $this->sendResponseError($e->getMessage(), $e->getCode());
        }
    }
}
