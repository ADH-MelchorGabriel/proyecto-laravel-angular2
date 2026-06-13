<?php

namespace App\Services;

class ToolsService
{
    private array $tools = [];

    /**
     * Constructor - Carga las herramientas en memoria
     */
    public function __construct()
    {
        $this->loadTools();
    }

    /**
     * Carga la lista de herramientas
     */
    private function loadTools(): void
    {
        $this->tools = [
            [
                'id' => 1,
                'name' => 'Visual Studio Code',
                'description' => 'Editor de código fuente',
                'category' => 'Editor',
                'version' => '1.90.0',
            ],
            [
                'id' => 2,
                'name' => 'Laravel',
                'description' => 'Framework PHP para desarrollo web',
                'category' => 'Framework',
                'version' => '11.0',
            ],
            [
                'id' => 3,
                'name' => 'Docker',
                'description' => 'Plataforma de containerización',
                'category' => 'DevOps',
                'version' => '24.0',
            ],
            [
                'id' => 4,
                'name' => 'Git',
                'description' => 'Sistema de control de versiones',
                'category' => 'VCS',
                'version' => '2.41.0',
            ],
            [
                'id' => 5,
                'name' => 'PostgreSQL',
                'description' => 'Base de datos relacional',
                'category' => 'Database',
                'version' => '15.0',
            ],
        ];
    }

    /**
     * Obtiene todas las herramientas
     */
    public function getAll(): array
    {
        return $this->tools;
    }

    /**
     * Obtiene una herramienta por ID
     */
    public function getById(int $id): ?array
    {
        foreach ($this->tools as $tool) {
            if ($tool['id'] === $id) {
                return $tool;
            }
        }
        return null;
    }

    /**
     * Filtra herramientas por categoría
     */
    public function getByCategory(string $category): array
    {
        return array_filter($this->tools, function ($tool) use ($category) {
            return strtolower($tool['category']) === strtolower($category);
        });
    }

    /**
     * Obtiene el total de herramientas
     */
    public function count(): int
    {
        return count($this->tools);
    }
}
