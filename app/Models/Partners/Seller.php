<?php

namespace App\Models\Partners;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Seller_stock;
use App\Models\Website\Order_item;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Seller extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'id',
        'email',
        'password',
        'first_name',
        'second_name',
        'user',
        'commercial_register',
        'tax_register',
        'inactive',
        'phone',
        'avatar',
        'create_at',
        'updated_at',
    ];

    // relationship product
    public function product()
    {
        return $this->hasMany(Product::class, 'seller_id', 'id');
    }

    // relationship seller stock
    public function seller_stocks()
    {
      return $this->hasOne(Seller_stock::class,  'seller_id','id');
    }

    // relationship Supply
    public function supply()
    {
        return $this->hasMany(Supply::class, 'product_id', 'id');
    }

    // relationship Order Items
    public function order_item()
    {
        return $this->hasMany(Order_item::class, 'seller_stock_id', 'id');
    }
}
