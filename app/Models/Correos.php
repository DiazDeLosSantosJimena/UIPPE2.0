<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_correo',
        'destinatario',
        'asunto',
        'contenido',
        'remitente',
        'fecha_envio'
    ];
}
