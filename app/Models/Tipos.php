<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    use HasFactory;
    protected $fillable = [
        'clave',
        'nombre',
        'descripcion',
        'foto',
        'activo',
         'id_registro'
    ];

    public function areameta() {
        return $this->hasOne(AreasMetas::class, 'id', 'programa_id');
    }
}
