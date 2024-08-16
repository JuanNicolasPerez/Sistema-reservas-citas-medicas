<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // RELACION CON EL MODELO USER 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // RELACION CON EL MODELO DOCTOR 
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // RELACION CON EL MODELO CONSULTORIO 
    public function consoltorio()
    {
        return $this->belongsTo(Consultorio::class);
    }
}
