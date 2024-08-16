<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    // RELACIONAMOS EL MODELO USER CON EL MODELO SECRETARIA
    public function user(){
        return $this->belongsTo(User::class);
    }
}
