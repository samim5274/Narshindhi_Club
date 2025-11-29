<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStockDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'product_id',
        'stockIn',
        'stockOut',
        'remark',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getNetStockAttribute()
    {
        return $this->stockIn - $this->stockOut; // net_stock  stockIn - stockOut
    }
}
