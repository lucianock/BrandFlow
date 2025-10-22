<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $marcas = Marca::paginate(5);
        return view('marcas', [ 'marcas'=>$marcas ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return \view('marcaCreate');
    }

    private function validarForm( Request $request )
    {
        $request->validate(
        //[ 'campo'=>regla1|regla2 ]
            [ 'mkNombre'=>'required|unique:marcas|min:2|max:30' ],
            [
                'mkNombre.required'=>'El campo "Nombre de la marca" es obligatorio.',
                'mkNombre.unique'=>'No puede haber dos marcas con el mismo nombre.',
                'mkNombre.min'=>'El campo "Nombre de la marca" debe tener al menos 2 caractéres.',
                'mkNombre.max'=>'El campo "Nombre de la marca" debe tener 30 caractéres como máximo.'
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //validación
        $this->validarForm($request);
        $mkNombre = $request->mkNombre;
        try {
            /*$marca = new Marca;
            $marca->mkNombre = $mkNombre;
            $marca->save();*/
            Marca::create(
                [
                    'mkNombre'=>$mkNombre
                ]
            );
            return redirect('/marcas')
                ->with([
                    'mensaje'=>'Marca: '.$mkNombre.' agregada correctamente.',
                    'css'=>'green'
                ]);
        }catch( \Throwable $th ){
            return redirect('/marcas')
                ->with([
                    'mensaje'=>'No se pudo agregar la marca: '.$mkNombre,
                    'css'=>'red'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca) : View
    {
        //$marca = Marca::find($request->idMarca);
        return view('marcaEdit', [ 'marca'=>$marca ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        //validación
        $this->validarForm($request);
        $mkNombre = $request->mkNombre;
        try {
            /*$marca = Marca::find($request->idMarca);
            $marca->mkNombre = $mkNombre;
            $marca->save();*/
            $marca->update(
                [
                    'mkNombre'=>$mkNombre
                ]
            );
            return redirect('/marcas')
                ->with([
                    'mensaje'=>'Marca: '.$mkNombre.' modificada correctamente.',
                    'css'=>'green'
                ]);
        }catch( \Throwable $th ){
            return redirect('/marcas')
                ->with([
                    'mensaje'=>'No se pudo modificar la marca: '.$mkNombre,
                    'css'=>'red'
                ]);
        }

    }

    /**
     * Show the form for confirming deletion of the specified resource.
     */
    public function confirmDelete(Marca $marca) : View
    {
        $productosAsociados = $marca->productos()->count();
        return view('marcaDelete', [
            'marca' => $marca,
            'productosAsociados' => $productosAsociados
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Marca $marca) : RedirectResponse
    {
        try {
            $nombreMarca = $marca->mkNombre;
            
            // Validar confirmación
            $request->validate([
                'confirmacion' => 'required|string'
            ], [
                'confirmacion.required' => 'Debe confirmar la eliminación escribiendo el nombre de la marca.',
                'confirmacion.string' => 'La confirmación debe ser un texto.'
            ]);

            // Verificar que la confirmación coincida exactamente
            if ($request->confirmacion !== $nombreMarca) {
                return redirect()->back()
                    ->with([
                        'mensaje' => 'La confirmación no coincide. Debe escribir exactamente: ' . $nombreMarca,
                        'css' => 'red'
                    ])
                    ->withInput();
            }
            
            // Verificar si hay productos asociados a esta marca
            $productosAsociados = $marca->productos()->count();
            if ($productosAsociados > 0) {
                return redirect('/marcas')
                    ->with([
                        'mensaje' => 'No se puede eliminar la marca "' . $nombreMarca . '" porque tiene ' . $productosAsociados . ' producto(s) asociado(s).',
                        'css' => 'red'
                    ]);
            }

            $marca->delete();

            return redirect('/marcas')
                ->with([
                    'mensaje' => 'Marca: ' . $nombreMarca . ' eliminada correctamente.',
                    'css' => 'green'
                ]);
        } catch (\Throwable $th) {
            return redirect('/marcas')
                ->with([
                    'mensaje' => 'No se pudo eliminar la marca.',
                    'css' => 'red'
                ]);
        }
    }
}
