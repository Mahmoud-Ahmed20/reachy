<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\products\Product;
use App\Models\Partners\Seller;


class Seller_stock extends Model
{


  use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

  protected $fillable = [
      'id',
      'quantity',
      'avatar_defuat',
      'product_id',
      'seller_id',
  ];

    public function product()
    {
        return $this->hasOne(Product::class,  'id','product_id');
    }

    public function seller()
    {
        return $this->hasMany(Seller::class,  'id','seller_id');
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class,  'id','seller_id');
    }

    // relationship Order Items
    public function order_item()
    {
        return $this->hasMany(Order_item::class, 'seller_stock_id', 'id');
    }
}
