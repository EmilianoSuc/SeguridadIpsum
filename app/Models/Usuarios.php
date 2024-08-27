<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable=[
        'id',
        'Nombre',
        'Apellido',
        'Correo',
        'Telefono',
        'Pais',
        'Comida_fav',
        'Artista_fav',
        'Lugar_fav',
        'Color_fav',
        'Contraseña',
    ];
    use HasFactory;
}
