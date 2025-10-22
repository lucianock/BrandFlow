<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $categorias = Categoria::paginate(5);
        return view('categorias', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('categoriaCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'catNombre' => 'required|unique:categorias|min:2|max:50'
        ], [
            'catNombre.required' => 'El campo "Nombre de la categoría" es obligatorio.',
            'catNombre.unique' => 'No puede haber dos categorías con el mismo nombre.',
            'catNombre.min' => 'El campo "Nombre de la categoría" debe tener al menos 2 caracteres.',
            'catNombre.max' => 'El campo "Nombre de la categoría" debe tener 50 caracteres como máximo.'
        ]);

        try {
            Categoria::create([
                'catNombre' => $request->catNombre
            ]);

            return redirect('/categorias')
                ->with([
                    'mensaje' => 'Categoría: ' . $request->catNombre . ' agregada correctamente.',
                    'css' => 'green'
                ]);
        } catch (\Throwable $th) {
            return redirect('/categorias')
                ->with([
                    'mensaje' => 'No se pudo agregar la categoría: ' . $request->catNombre,
                    'css' => 'red'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria) : View
    {
        return view('categoriaShow', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria) : View
    {
        return view('categoriaEdit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria) : RedirectResponse
    {
        $request->validate([
            'catNombre' => 'required|unique:categorias,catNombre,' . $categoria->idCategoria . ',idCategoria|min:2|max:50'
        ], [
            'catNombre.required' => 'El campo "Nombre de la categoría" es obligatorio.',
            'catNombre.unique' => 'No puede haber dos categorías con el mismo nombre.',
            'catNombre.min' => 'El campo "Nombre de la categoría" debe tener al menos 2 caracteres.',
            'catNombre.max' => 'El campo "Nombre de la categoría" debe tener 50 caracteres como máximo.'
        ]);

        try {
            $categoria->update([
                'catNombre' => $request->catNombre
            ]);

            return redirect('/categorias')
                ->with([
                    'mensaje' => 'Categoría: ' . $request->catNombre . ' modificada correctamente.',
                    'css' => 'green'
                ]);
        } catch (\Throwable $th) {
            return redirect('/categorias')
                ->with([
                    'mensaje' => 'No se pudo modificar la categoría: ' . $request->catNombre,
                    'css' => 'red'
                ]);
        }
    }

    /**
     * Show the form for confirming deletion of the specified resource.
     */
    public function confirmDelete(Categoria $categoria) : View
    {
        $productosAsociados = $categoria->productos()->count();
        return view('categoriaDelete', [
            'categoria' => $categoria,
            'productosAsociados' => $productosAsociados
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Categoria $categoria) : RedirectResponse
    {
        try {
            $nombreCategoria = $categoria->catNombre;
            
            // Validar confirmación
            $request->validate([
                'confirmacion' => 'required|string'
            ], [
                'confirmacion.required' => 'Debe confirmar la eliminación escribiendo el nombre de la categoría.',
                'confirmacion.string' => 'La confirmación debe ser un texto.'
            ]);

            // Verificar que la confirmación coincida exactamente
            if ($request->confirmacion !== $nombreCategoria) {
                return redirect()->back()
                    ->with([
                        'mensaje' => 'La confirmación no coincide. Debe escribir exactamente: ' . $nombreCategoria,
                        'css' => 'red'
                    ])
                    ->withInput();
            }
            
            // Verificar si hay productos asociados a esta categoría
            $productosAsociados = $categoria->productos()->count();
            if ($productosAsociados > 0) {
                return redirect('/categorias')
                    ->with([
                        'mensaje' => 'No se puede eliminar la categoría "' . $nombreCategoria . '" porque tiene ' . $productosAsociados . ' producto(s) asociado(s).',
                        'css' => 'red'
                    ]);
            }

            $categoria->delete();

            return redirect('/categorias')
                ->with([
                    'mensaje' => 'Categoría: ' . $nombreCategoria . ' eliminada correctamente.',
                    'css' => 'green'
                ]);
        } catch (\Throwable $th) {
            return redirect('/categorias')
                ->with([
                    'mensaje' => 'No se pudo eliminar la categoría.',
                    'css' => 'red'
                ]);
        }
    }
}
