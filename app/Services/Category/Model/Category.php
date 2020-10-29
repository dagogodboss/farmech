<?php

namespace App\Services\Category\Model;

use App\Services\Product\Model\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{


    protected $fillable = [
        'name', 'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class); // defining one to many relationship between prodct
    }
}
