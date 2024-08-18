<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImageGallery extends Model
{
    use HasFactory;

    // making a relationship sa database prodfuct

    public function product(){
        return $this->belongsTo(Product::class);
    }
}