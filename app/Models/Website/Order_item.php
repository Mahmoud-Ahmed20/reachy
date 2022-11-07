<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\products\product;
use App\Models\Admin\Seller_stock;
use App\Models\Partners\Seller;

class Order_item extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'id',
        'price',
        'quantity',
        'tax',
        'sub_fees',
        'discount',
        'final_price',
        'order_id',
        'product_id',
        'seller_id',
        'seller_stock_id',
        'created_at',
        'updated_at',
    ];

    // relationship Orders
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    // relationship product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // relationship seller
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'id');
    }

    // relationship seller_stock
    public function seller_stock()
    {
        return $this->belongsTo(Seller_stock::class, 'seller_stock_id', 'id');
    }
}