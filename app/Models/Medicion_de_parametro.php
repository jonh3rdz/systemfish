<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicion_de_parametro extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'contenido','numero_de_tanque','cantidad','pH','HRPH','amonio','nitrito','nitrate','temperatura','oxigeno'];
}
