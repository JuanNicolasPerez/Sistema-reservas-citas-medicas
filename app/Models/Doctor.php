<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'telefono', 'licencia_medica', 'especialidad', 'user_id'];

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // RELACIONAMOS EL MODELO DOCTOR CON EL MODELO EVENT
    public function event(){
        return $this->hasMany(Event::class);
    }

    public function historial(){
        return $this->HasMany(Historial::class);
    }

    public function pagos(){
        return $this->hasMany(Pago::class);
    }
}
