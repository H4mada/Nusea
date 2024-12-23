<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [ // fillable adalah field yang boleh diisi
        'products_id',
        'users_id'
    ];

    protected $hidden = [
        
    ];

    // productnya apa
    public function product() {
        return $this->hasOne(Product::class,'id','products_id');
    }

    // usernya siapa
    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
