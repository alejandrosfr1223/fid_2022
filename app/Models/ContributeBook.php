<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributeBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'edicion',
        'paginas',
        'isbn',
        'notas',
        'clasific',
        'disponib',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
        'doc_route',
        'user_id',
        'status'
    ];
}
