<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Estadísticas optimizadas
        $stats = [
            'total_productos' => Producto::count(),
            'total_marcas' => Marca::count(),
            'total_categorias' => Categoria::count(),
            'precio_promedio' => Producto::avg('prdPrecio'),
            'precio_minimo' => Producto::min('prdPrecio'),
            'precio_maximo' => Producto::max('prdPrecio'),
            'productos_hoy' => Producto::whereDate('created_at', today())->count(),
            'marcas_hoy' => Marca::whereDate('created_at', today())->count(),
            'categorias_hoy' => Categoria::whereDate('created_at', today())->count(),
        ];

        // Productos recientes
        $productosRecientes = Producto::with(['getMarca', 'getCate'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'productosRecientes'));
    }
}
