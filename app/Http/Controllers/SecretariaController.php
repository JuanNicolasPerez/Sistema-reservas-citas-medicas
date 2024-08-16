<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    // VISTA PRINCIPAL
    public function index()
    {
        $secretarias = Secretaria::with('user')->get();
        return view('admin.secretarias.index', compact('secretarias'));
    }

    // VISTA FORMULARIO CREAR
    public function create()
    {
        return view('admin.secretarias.create');
    }

    // CONTROLADOR PARA INSERTAR LOS DATOS
    public function store(Request $request)
    {
        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombres'          => 'required|max:100',
            'apellidos'        => 'required|max:100',
            'dni'              => 'required|max:8|unique:secretarias',
            'celular'          => 'required|max:10',
            'fecha_nacimiento' => 'required|max:100',
            'direccion'        => 'required|max:100',
            'email'            => 'required|max:100|unique:users',
            'password'         => 'required|max:100|confirmed',
        ]);

        // CREAMOS EL OBJETO USUARIO
        $usuario = new User();
        $usuario -> name = $request->nombres;
        $usuario -> email = $request->email;
        $usuario -> password = Hash::make($request['password']);

        $usuario->save();

        // CREAMOS EL OBJETO SECRETARIA
        $secretaria = new Secretaria();
        $secretaria -> user_id = $usuario -> id;
        $secretaria -> nombres = $request -> nombres;
        $secretaria -> apellidos = $request -> apellidos;
        $secretaria -> dni = $request -> dni;
        $secretaria -> celular = $request -> celular;
        $secretaria -> fecha_nacimiento = $request -> fecha_nacimiento;
        $secretaria -> direccion = $request -> direccion;

        $secretaria->save();

        // ASIGNAMOS EL ROL
        $usuario->assignRole('secretaria');

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Se registro a la secretaria de manera correcta.')
            ->with('icono', 'success')
        ;
    }

    // VISTA MOSTRAR SECRETARIA
    public function show($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.show', compact('secretaria'));
    }

    // VISTA EDITAR SECRETARIA
    public function edit($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.edit', compact('secretaria'));
    }

    // VISTA ACTUALIZAR SECRETARIA
    public function update(Request $request, $id)
    {

        $secretaria= Secretaria::find($id);

        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombres'          => 'required|max:100',
            'apellidos'        => 'required|max:100',
            'dni'              => 'required|max:8|unique:secretarias,dni,'.$secretaria->id,
            'celular'          => 'required|max:10',
            'fecha_nacimiento' => 'required|max:100',
            'direccion'        => 'required|max:100',
            'email'            => 'required|max:100|unique:users,email,'.$secretaria->user->id,
            'password'         => 'nullable|max:100|confirmed',
        ]);

        // ACTUALIZA SECRETARIA
        $secretaria -> nombres = $request -> nombres;
        $secretaria -> apellidos = $request -> apellidos;
        $secretaria -> dni = $request -> dni;
        $secretaria -> celular = $request -> celular;
        $secretaria -> fecha_nacimiento = $request -> fecha_nacimiento;
        $secretaria -> direccion = $request -> direccion;

        $secretaria->save();

        // ACTUALIZA USUARIO
        $usuario = User::find($secretaria->user->id);
        $usuario -> name = $request->nombres;
        $usuario -> email = $request->email;

        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }

        $usuario->save();

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Se actualizo al usuario de manera correcta.')
            ->with('icono', 'success')
        ;
    }

    // VISTA CONFIRMAR ELIMINAR SECRETARIA
    public function confirmDelete($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.delete', compact('secretaria'));
    }

    // VISTA ELIMINAR SECRETARIA
    public function destroy($id)
    {
        $secretaria = Secretaria::find($id);

        // ELIMINAR AL USUARIO ASOCIADO
        $user = $secretaria->user;
        $user->delete();

        // ELIMINAR A LA SECRETARIA
        $secretaria->delete();

        return redirect()->route('admin.secretarias.index')
        ->with('mensaje', 'Se elimino a la secretaria de manera correcta.')
        ->with('icono', 'success');
    }
}
