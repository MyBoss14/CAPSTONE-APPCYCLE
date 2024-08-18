<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
// create relationship sa seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
// create relationship sa category
    public function category(){
        return $this->belongsTo(Category::class);
    }
// creating relationship sa image gallery
    public function productImageGalleries(){
        return $this->hasMany(ProductImageGallery::class);
    }
    // Define a new relationship to access the user_id through the seller
    public function user()
    {
        return $this->seller->user();
    }
}
