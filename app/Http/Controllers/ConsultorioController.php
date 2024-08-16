<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     * Mostrar una lista del recursos
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('admin.consultorios.index', compact('consultorios'));
    
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view('admin.consultorios.create');
    }

    /**
     * Store a newly created resource in storage.
     * Almacene un recurso recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        // VALIDAMOS UQE VENGAN LOS DATOS DEL FORMULARIO
        // $datos = request()->all();
        // return response()->json($datos);

        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombre'        => 'required',
            'ubicacion'     => 'required',
            'capacidad'     => 'required',
            'telefono'      => 'required',
            'especialidad'  => 'required',
            'estado'        => 'required',
        ]);

        // ESTA SE APLICADA CUANDO CREAMOS EL PROTECTED EN EL MODELO
        Consultorio::create($request->all());

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Se registro al consultorio de manera correcta.')
            ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     * Muestre el recurso especificado.
     */
    public function show($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.show', compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.edit', compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     * Actualice el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, $id)
    {

        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombre'        => 'required',
            'ubicacion'     => 'required',
            'capacidad'     => 'required',
            'telefono'      => 'required',
            'especialidad'  => 'required',
            'estado'        => 'required',
        ]);

        // ESTA SE APLICADA CUANDO CREAMOS EL PROTECTED EN EL MODELO
        $consultorio= Consultorio::find($id);
        $consultorio->update($request->all());

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Se actualizo al consultorio de manera correcta.')
            ->with('icono', 'success');
    }

    // VISTA CONFIRMAR ELIMINAR PACIENTE
    public function confirmDelete($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.delete', compact('consultorio'));
    }

    /**
     * Remove the specified resource from storage.
     * Elimine el recurso especificado del almacenamiento.
     */
    public function destroy($id)
    {
        Consultorio::destroy($id);

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Se elimino al paciente de manera correcta.')
        ->with('icono', 'success');
    }

}
