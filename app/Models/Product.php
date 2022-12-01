<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "service",
        "levelsub",
        "id_service",
        "id_proyectsub",
        "nameproject",
        "idtableaffected",
        "price",
        "description",
        "priceidstripe"
    ];
    
}
