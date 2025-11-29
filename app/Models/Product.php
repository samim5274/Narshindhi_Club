<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'purchase_price',
        'total_price',
        'stock',
        'remark',
    ];

    public function productstock()
    {
        return $this->hasMany(ProductStockDetails::class, 'product_id');
    }
}
