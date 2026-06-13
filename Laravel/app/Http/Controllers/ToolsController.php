<?php

namespace App\Http\Controllers;

use App\Services\ToolsService;
use Illuminate\Http\JsonResponse;

class ToolsController extends Controller
{
    private ToolsService $toolsService;

    /**
     * Constructor - Inyecta el servicio de herramientas
     */
    public function __construct(ToolsService $toolsService)
    {
        $this->toolsService = $toolsService;
    }

    /**
     * Retorna la lista de todas las herramientas
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->toolsService->getAll(),
            'count' => $this->toolsService->count(),
        ]);
    }

    /**
     * Retorna una herramienta específica por ID
     */
    public function show(int $id): JsonResponse
    {
        $tool = $this->toolsService->getById($id);

        if (!$tool) {
            return response()->json([
                'success' => false,
                'message' => 'Herramienta no encontrada',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $tool,
        ]);
    }

    /**
     * Retorna herramientas filtradas por categoría
     */
    public function byCategory(string $category): JsonResponse
    {
        $tools = $this->toolsService->getByCategory($category);

        if (empty($tools)) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron herramientas en esta categoría',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'category' => $category,
            'data' => array_values($tools),
            'count' => count($tools),
        ]);
    }
}
