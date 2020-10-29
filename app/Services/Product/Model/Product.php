<?php

namespace App\Services\Product\Model;

use App\Services\Category\Model\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'quantity', 'status', 'image', 'categories_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
