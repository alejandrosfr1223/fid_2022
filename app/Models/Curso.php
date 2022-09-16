<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'ponente',
        'enlace',
        'notas',
        'descripcion',
        'clasific',
        'costo',
        'disponib',
    ];
}
