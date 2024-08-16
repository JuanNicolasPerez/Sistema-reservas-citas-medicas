<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = Configuracione::all();
        return view('admin.configuracion.index', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuracion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombre'    => 'required',
            'direccion' => 'required',
            'telefono'  => 'required',
            'correo'    => 'required',
            'logo'      => 'required',
        ]);

        $configuracion = new Configuracione();

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;
        $configuracion->logo = $request->file('logo')->store('logos', 'public');

        $configuracion->save();

        return redirect()->route('admin.configuracion.index')
        ->with('mensaje', 'Se registro la configuración de manera correcta.')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $configuracion = Configuracione::findOrFail($id);
        return view('admin.configuracion.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuracion = Configuracione::findOrFail($id);
        return view('admin.configuracion.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $configuracion = Configuracione::find($id);

        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombre'    => 'required',
            'direccion' => 'required',
            'telefono'  => 'required',
            'correo'    => 'required',
        ]);

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;

        // VERIFICAMOS SI SE MODIFICO O NO LA IMAGEN
        if($request->hasFile('logo')){
            Storage::delete('public/'.$configuracion->logo);
            $configuracion->logo = $request->file('logo')->store('logos', 'public');
        }

        $configuracion->save();

        return redirect()->route('admin.configuracion.index')
        ->with('mensaje', 'Se actualizo la configuración de manera correcta.')
        ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $configuracion = Configuracione::findOrFail($id);
        return view('admin.configuracion.delete', compact('configuracion'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // ELIMINAMOS LA IMAGEN
        $configuracion = Configuracione::findOrFail($id);
        Storage::delete('public/'.$configuracion->logo);

        // ELIMINAMOS EL REGISTRO
        $configuracion::destroy($id);

        return redirect()->route('admin.configuracion.index')
        ->with('mensaje', 'Se elimino la configuración de manera correcta.')
        ->with('icono', 'success');
    }
}
