<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    // VISTA PRINCIPAL
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    // VISTA FORMULARIO CREAR
    public function create()
    {
        return view('admin.pacientes.create');
    }

    // CONTROLADOR PARA INSERTAR LOS DATOS
    public function store(Request $request)
    {
        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombres'               => 'required|max:100',
            'apellidos'             => 'required|max:100',
            'dni'                   => 'required|max:8|unique:pacientes',
            'numero_seguro'         => 'required|max:100|unique:pacientes',
            'fecha_nacimiento'      => 'required|max:100',
            'genero'                => 'required|max:100',
            'celular'               => 'required|max:100',
            'contacto_emergencia'   => 'required|max:100',            
            'correo'                => 'required|max:100|unique:pacientes',
            'direccion'             => 'required|max:255',
            'grupo_sanguinio'       => 'required|max:255',
            'alergias'              => 'required|max:255',
            'observacion'           => 'required|max:255',
        ]);

        // CREAMOS EL OBJETO PACIENTE
        $paciente = new Paciente();

        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->dni = $request->dni;
        $paciente->numero_seguro = $request->numero_seguro;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguinio = $request->grupo_sanguinio;
        $paciente->alergias = $request->alergias;
        $paciente->observacion = $request->observacion;

        $paciente->save();

        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Se registro al paciente de manera correcta.')
            ->with('icono', 'success');
    }

    // VISTA MOSTRAR USUARIO
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show', compact('paciente'));
    }

    // VISTA EDITAR PACIENTE
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }
    
    // VISTA ACTUALIZAR PACIENTE
    public function update(Request $request, $id)
    {

        $paciente= Paciente::find($id);

        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombres'               => 'required|max:100',
            'apellidos'             => 'required|max:100',
            'dni'                   => 'required|max:8|unique:pacientes,dni,'.$paciente->id,
            'numero_seguro'         => 'required|max:100|unique:pacientes,numero_seguro,'.$paciente->id,
            'fecha_nacimiento'      => 'required|max:100',
            'genero'                => 'required|max:100',
            'celular'               => 'required|max:100',
            'contacto_emergencia'   => 'required|max:100',            
            'correo'                => 'required|max:100|unique:pacientes,correo,'.$paciente->id,
            'direccion'             => 'required|max:255',
            'grupo_sanguinio'       => 'required|max:255',
            'alergias'              => 'required|max:255',
            'observacion'           => 'required|max:255',
        ]);

        // MODIFICAMOS LOS DATOS DEL PACIENTE
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->dni = $request->dni;
        $paciente->numero_seguro = $request->numero_seguro;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguinio = $request->grupo_sanguinio;
        $paciente->alergias = $request->alergias;
        $paciente->observacion = $request->observacion;

        $paciente->save();

        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Se actualizo al paciente de manera correcta.')
            ->with('icono', 'success')
        ;

    }

    // VISTA CONFIRMAR ELIMINAR PACIENTE
    public function confirmDelete($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.delete', compact('paciente'));
    }

    // VISTA ELIMINAR PACIENTE
    public function destroy($id)
    {
        Paciente::destroy($id);

        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se elimino al paciente de manera correcta.')
        ->with('icono', 'success');
    }
}
