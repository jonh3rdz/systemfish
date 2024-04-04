<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_de_tanque extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'numero_de_tanque','cantidad','tasa_de_mortalidad'];
}
