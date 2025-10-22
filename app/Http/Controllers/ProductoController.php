<?php

namespace App\Http\Controllers;


use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $query = Producto::with(['getMarca', 'getCate']);

        // Búsqueda por texto
        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('prdNombre', 'LIKE', "%{$search}%")
                  ->orWhere('prdDescripcion', 'LIKE', "%{$search}%");
            });
        }

        // Filtro por marca
        if (request('brand')) {
            $query->where('idMarca', request('brand'));
        }

        // Filtro por categoría
        if (request('category')) {
            $query->where('idCategoria', request('category'));
        }

        // Filtro por precio mínimo
        if (request('min_price')) {
            $query->where('prdPrecio', '>=', request('min_price'));
        }

        // Filtro por precio máximo
        if (request('max_price')) {
            $query->where('prdPrecio', '<=', request('max_price'));
        }

        $productos = $query->orderBy('prdNombre')->paginate(9);
        
        return \view('productos', [ 'productos'=>$productos ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return \view('productoCreate',
                    [
                        'marcas'=>$marcas,
                        'categorias'=>$categorias
                    ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request) : RedirectResponse
    {
        try {
            $producto = new Producto();
            $producto->prdNombre = $request->prdNombre;
            $producto->prdPrecio = $request->prdPrecio;
            $producto->idMarca = $request->idMarca;
            $producto->idCategoria = $request->idCategoria;
            $producto->prdDescripcion = $request->prdDescripcion;
            $producto->prdActivo = 1;

            // Manejo de imagen
            if ($request->hasFile('prdImagen')) {
                $imagen = $request->file('prdImagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $imagen->move(public_path('imgs'), $nombreImagen);
                $producto->prdImagen = $nombreImagen;
            } else {
                $producto->prdImagen = 'noDisponible.jpg';
            }

            $producto->save();

            return redirect('/productos')
                ->with([
                    'mensaje' => 'Producto: ' . $request->prdNombre . ' agregado correctamente.',
                    'css' => 'green'
                ]);
        } catch (\Throwable $th) {
            return redirect('/productos')
                ->with([
                    'mensaje' => 'No se pudo agregar el producto: ' . $request->prdNombre,
                    'css' => 'red'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto) : View
    {
        return view('productoShow', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto) : View
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('productoEdit', [
            'producto' => $producto,
            'marcas' => $marcas,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto) : RedirectResponse
    {
        $request->validate([
            'prdNombre' => 'required|min:2|max:100',
            'prdPrecio' => 'required|numeric|min:0',
            'idMarca' => 'required|exists:marcas,idMarca',
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'prdDescripcion' => 'required|min:10|max:500',
            'prdImagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $producto->prdNombre = $request->prdNombre;
            $producto->prdPrecio = $request->prdPrecio;
            $producto->idMarca = $request->idMarca;
            $producto->idCategoria = $request->idCategoria;
            $producto->prdDescripcion = $request->prdDescripcion;

            // Manejo de imagen
            if ($request->hasFile('prdImagen')) {
                // Eliminar imagen anterior si no es la por defecto
                if ($producto->prdImagen && $producto->prdImagen !== 'noDisponible.jpg') {
                    $rutaImagen = public_path('imgs/' . $producto->prdImagen);
                    if (file_exists($rutaImagen)) {
                        unlink($rutaImagen);
                    }
                }

                $imagen = $request->file('prdImagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $imagen->move(public_path('imgs'), $nombreImagen);
                $producto->prdImagen = $nombreImagen;
            }

            $producto->save();

            return redirect('/productos')
                ->with([
                    'mensaje' => 'Producto: ' . $request->prdNombre . ' modificado correctamente.',
                    'css' => 'green'
                ]);
        } catch (\Throwable $th) {
            return redirect('/productos')
                ->with([
                    'mensaje' => 'No se pudo modificar el producto: ' . $request->prdNombre,
                    'css' => 'red'
                ]);
        }
    }

    /**
     * Show the form for confirming deletion of the specified resource.
     */
    public function confirmDelete(Producto $producto) : View
    {
        return view('productoDelete', [
            'producto' => $producto
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Producto $producto) : RedirectResponse
    {
        try {
            $nombreProducto = $producto->prdNombre;
            
            // Validar confirmación
            $request->validate([
                'confirmacion' => 'required|string'
            ], [
                'confirmacion.required' => 'Debe confirmar la eliminación escribiendo el nombre del producto.',
                'confirmacion.string' => 'La confirmación debe ser un texto.'
            ]);

            // Verificar que la confirmación coincida exactamente
            if ($request->confirmacion !== $nombreProducto) {
                return redirect()->back()
                    ->with([
                        'mensaje' => 'La confirmación no coincide. Debe escribir exactamente: ' . $nombreProducto,
                        'css' => 'red'
                    ])
                    ->withInput();
            }
            
            // Eliminar imagen si no es la por defecto
            if ($producto->prdImagen && $producto->prdImagen !== 'noDisponible.jpg') {
                $rutaImagen = public_path('imgs/' . $producto->prdImagen);
                if (file_exists($rutaImagen)) {
                    unlink($rutaImagen);
                }
            }

            $producto->delete();

            return redirect('/productos')
                ->with([
                    'mensaje' => 'Producto: ' . $nombreProducto . ' eliminado correctamente.',
                    'css' => 'green'
                ]);
        } catch (\Throwable $th) {
            return redirect('/productos')
                ->with([
                    'mensaje' => 'No se pudo eliminar el producto.',
                    'css' => 'red'
                ]);
        }
    }
}
