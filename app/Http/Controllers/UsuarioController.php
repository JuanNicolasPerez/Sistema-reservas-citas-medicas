<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    // VISTA PRINCIPAL
    public function index()
    {
        $usuario = User::all();
        return view('admin.usuarios.index', compact('usuario'));
    }

    // VISTA FORMULARIO CREAR
    public function create()
    {
        return view('admin.usuarios.create');
    }

    // CONTROLADOR PARA INSERTAR LOS DATOS
    public function store(Request $request)
    {
        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users',
            'password' => 'required|confirmed',
        ]);

        // CREAMOS EL OBJETO
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);

        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Se registro al usuario de manera correcta.')
            ->with('icono', 'success');
    }

    // VISTA MOSTRAR USUARIO
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    // VISTA EDITAR USUARIO
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    // VISTA ACTUALIZAR USUARIO
    public function update(Request $request, $id)
    {

        $usuario = User::find($id);

        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users,email,'.$usuario->id,
            'password' => 'nullable|max:100|confirmed',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }

        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Se actualizo al usuario de manera correcta.')
            ->with('icono', 'success');
    }

    // VISTA CONFIRMAR ELIMINAR USUARIO
    public function confirmDelete($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

    // VISTA ELIMINAR USUARIO
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Se elimino al usuario de manera correcta.')
        ->with('icono', 'success');
    }
}
