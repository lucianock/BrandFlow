<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index() : View
    {
        // Estadísticas generales
        $stats = [
            'total_productos' => Producto::count(),
            'total_marcas' => Marca::count(),
            'total_categorias' => Categoria::count(),
            'precio_promedio' => Producto::avg('prdPrecio'),
            'precio_minimo' => Producto::min('prdPrecio'),
            'precio_maximo' => Producto::max('prdPrecio'),
        ];

        // Productos por marca (solo marcas que tienen productos)
        $productosPorMarca = Marca::withCount('productos')
            ->whereHas('productos')
            ->orderBy('productos_count', 'desc')
            ->take(5)
            ->get();

        // Productos por categoría (solo categorías que tienen productos)
        $productosPorCategoria = Categoria::withCount('productos')
            ->whereHas('productos')
            ->orderBy('productos_count', 'desc')
            ->take(5)
            ->get();

        // Rango de precios
        $rangosPrecio = [
            '0-100' => Producto::whereBetween('prdPrecio', [0, 100])->count(),
            '101-500' => Producto::whereBetween('prdPrecio', [101, 500])->count(),
            '501-1000' => Producto::whereBetween('prdPrecio', [501, 1000])->count(),
            '1001+' => Producto::where('prdPrecio', '>', 1000)->count(),
        ];

        // Productos más caros
        $productosCaros = Producto::with(['getMarca', 'getCate'])
            ->orderBy('prdPrecio', 'desc')
            ->take(5)
            ->get();

        // Productos más baratos
        $productosBaratos = Producto::with(['getMarca', 'getCate'])
            ->orderBy('prdPrecio', 'asc')
            ->take(5)
            ->get();

        // Marcas con más productos
        $marcasPopulares = Marca::withCount('productos')
            ->whereHas('productos')
            ->orderBy('productos_count', 'desc')
            ->take(10)
            ->get();

        return view('estadisticas', compact(
            'stats',
            'productosPorMarca',
            'productosPorCategoria',
            'rangosPrecio',
            'productosCaros',
            'productosBaratos',
            'marcasPopulares'
        ));
    }

    public function exportar() 
    {
        // Aquí se implementaría la exportación de datos
        return response()->json(['message' => 'Exportación implementada']);
    }
}
