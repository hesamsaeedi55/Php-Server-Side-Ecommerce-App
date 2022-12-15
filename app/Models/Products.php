<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name',
        'brand_id',
        'category_id_id',
        'slug',
        'description',
        'price',
        'entity',
        'image',
        'image2',
        'image3',
        'avvailable'

    ];
}
