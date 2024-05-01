<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasUsuarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'area_id',
        'usuario_id',
        'id_registro',
        'activo'
    ];
}
