<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_de_sedimento extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'numero_de_tanque','observaciones'];
}
