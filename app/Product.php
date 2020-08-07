<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $primarykey = "id";

    protected $fillable = [
        'category_id', 'brand_name', 'model', 'price', 'photo', 'decription'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}