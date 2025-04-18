<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $fillable = [
        'img1',
        'img2',
        'img3',
        'img4',
        'description',
        'size',
        'color',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
