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
        'Comiada_Fav',
        'Artista_Fav',
        'Lugar_Fav',
        'Color_Fav',
        'Contrasena',
    ];
    use HasFactory;
}
