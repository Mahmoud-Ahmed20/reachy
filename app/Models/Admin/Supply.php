<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\products\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Partners\Seller;
use App\Models\Admin\Seller_stock;

class Supply extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'quantity',
        'product_id',
        'seller_id',
        'seller_stock_id',
        'deleted_at',
    ];



    public function product()
    {
        return $this->hasOne(Product::class,  'id','product_id');
    }

    public function seller()
    {
        return $this->hasMany(Seller::class,  'id','seller_id');
    }
    public function seller_stock()
    {
        return $this->hasMany(Seller_stock::class,  'id','seller_stock_id');
    }
}
