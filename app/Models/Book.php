<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'edicion',
        'paginas',
        'isbn',
        'enlace',
        'url_img_caratula',
        'notas',
        'clasific',
        'precio',
        'disponib',
        'img_1',
        'img_2',
        'img_3',
        'img_4'
    ];
}
