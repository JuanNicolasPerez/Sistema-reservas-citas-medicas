<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Configuracione;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Secretaria;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Event\TestRunner\Configured;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class,]);

        // ADMINISTRADOR
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('admin');

        // SECRETARIA
        User::create([
            'name' => 'Secretarias',
            'email' => 'Sec@Sec.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres'          => 'Secretaria',
            'apellidos'        => 'Secretaria',
            'dni'              => '12354852',
            'celular'          => '3745125482',
            'fecha_nacimiento' => '10/10/2000',
            'direccion'        => 'Sin direccion',
            'user_id'          => '2',
        ]);

        // DOCTORES
        User::create([
            'name' => 'Doctor1',
            'email' => 'Doctor1@Doctor1.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'          => 'Dr. Castillo',
            'apellidos'        => 'Daniel',
            'telefono'         => '02354802',
            'licencia_medica'  => '00121513',
            'especialidad'     => 'PEDIATRIA',
            'user_id'          => '3',
        ]);

        User::create([
            'name' => 'Doctor2',
            'email' => 'Doctor2@Doctor2.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'          => 'Dr. Castellano',
            'apellidos'        => 'Jorge',
            'telefono'         => '52354859',
            'licencia_medica'  => '00121514',
            'especialidad'     => 'CARDIOLOGO',
            'user_id'          => '4',
        ]);

        User::create([
            'name' => 'Doctor3',
            'email' => 'Doctor3@Doctor3.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'          => 'Dr. Marsial',
            'apellidos'        => 'Lautaro',
            'telefono'         => '13548252',
            'licencia_medica'  => '00121515',
            'especialidad'     => 'EMERGENCIA',
            'user_id'          => '5',
        ]);

        // USUARIO
        User::create([
            'name' => 'Usuario1',
            'email' => 'Usuario1@Usuario1.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('usuario');

        // PACIENTES
        User::create([
            'name' => 'Paciente1',
            'email' => 'Paciente1@Paciente1.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('paciente');

        // CONSULTORIOS
        Consultorio::create([
            'nombre'        => 'Consultorio Nro 1',
            'ubicacion'     => '1° Piso, sala A1',
            'capacidad'     => '5 Pers',
            'telefono'      => '0002',
            'especialidad'  => 'PEDIATRIA',
            'estado'        => 'ACTIVO',
        ]);

        Consultorio::create([
            'nombre'        => 'Consultorio Nro 2',
            'ubicacion'     => '1° Piso, sala B1',
            'capacidad'     => '10 Pers',
            'telefono'      => '0003',
            'especialidad'  => 'CARDIOLOGIA',
            'estado'        => 'ACTIVO',
        ]);

        Consultorio::create([
            'nombre'        => 'Consultorio Nro 3',
            'ubicacion'     => '1° Piso, sala C1',
            'capacidad'     => '15 Pers',
            'telefono'      => '0001',
            'especialidad'  => 'EMERGENCIAS',
            'estado'        => 'ACTIVO',
        ]);

        $this->call([PacienteSeeder::class,]);

        //HORARIOS
        Horario::create([
            'dia'=>'LUNES',
            'hora_inicio'=>'08:00:00',
            'hora_fin'=>'14:00:00',
            'doctor_id'=>'1',
            'consultorio_id'=>'1',
        ]);

        Configuracione::create([
            'nombre'=>'Clinica Corazon',
            'direccion'=>'Las Marias, calle 32, ARG',
            'telefono'=>'0111245789',
            'correo'=>'lasmarias@gmail.com',
            'logo'=>'logos/sUkcXP3yOsfpVxrc2m8Qz0Bla5ue12UTAD96fC9g.jpg',
        ]);
    }
}
