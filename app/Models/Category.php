<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [ // fillable adalah field yang boleh diisi
        'name',
        'photos',
        'slug',
        
    ];

    protected $hidden = [
       
    ];
}
