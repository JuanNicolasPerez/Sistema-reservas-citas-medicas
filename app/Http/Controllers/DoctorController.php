<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores = Doctor::with('user')->get();
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombres'          => 'required',
            'apellidos'        => 'required',
            'telefono'         => 'required',
            'licencia_medica'  => 'required',
            'especialidad'     => 'required',

            'email'            => 'required|max:100|unique:users',
            'password'         => 'required|max:100|confirmed',
        ]);

        // CREAMOS EL OBJETO USUARIO
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);

        $usuario->save();

        // CREAMOS EL OBJETO DOCTOR
        $doctor = new Doctor();
        $doctor->user_id = $usuario->id;
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;

        $doctor->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se registro al doctor de manera correcta.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $doctor = Doctor::find($id);

        // VALIDAMOS AL FORMULARIO
        $request->validate([
            'nombres'          => 'required',
            'apellidos'        => 'required',
            'telefono'         => 'required',
            'licencia_medica'  => 'required',
            'especialidad'     => 'required',

            'email'            => 'required|max:100|unique:users,email,' . $doctor->user->id,
            'password'         => 'nullable|max:100|confirmed',
        ]);

        // ACTUALIZA DOCTOR
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;

        $doctor->save();

        // ACTUALIZA USUARIO
        $usuario = User::find($doctor->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request['password']);
        }

        $usuario->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se actualizo al doctor de manera correcta.')
            ->with('icono', 'success');
    }

    // VISTA CONFIRMAR ELIMINAR SECRETARIA
    public function confirmDelete($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.delete', compact('doctor'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        // ELIMINAR AL USUARIO ASOCIADO
        $user = $doctor->user;
        $user->delete();

        // ELIMINAR A LA SECRETARIA
        $doctor->delete();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se elimino a l doctor de manera correcta.')
            ->with('icono', 'success');
    }

    public function reportes()
    {
        return view('admin.doctores.reportes');
    }

    public function pdf()
    {
        $configuracion = Configuracione::latest()->first();
        $doctores = Doctor::all();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.doctores.pdf',
            compact(
                'configuracion',
                'doctores'
            )
        );

        // INCLUIR PIE DE PAGINA 
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(450, 800, "Fecha: ".\Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));

        return $pdf->stream();
    }
}
