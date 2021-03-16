<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'image',
        'accessories',
        'warranty',
        'condition',
        'promotion',
        'status',
        'description',
        'featured',
        'category_id'
    ];

    function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
