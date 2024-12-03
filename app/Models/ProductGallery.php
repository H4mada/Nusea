<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'photos', 'products_id'
    ];

    protected $hidden = [

    ];

    // relasi ke product
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    
}
