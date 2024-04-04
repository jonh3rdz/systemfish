<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siembra_de_pece extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'numero_de_tanque','cantidad'];
}
