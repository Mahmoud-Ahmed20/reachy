<?php

namespace App\Models\Admin\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Subscription;
use App\Models\Admin\products\Product;

class SubPrices extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'price',
        'subscription_id',
        'product_id'
    ];


    public function product()
    {
        return $this->hasMany(Product::class,  'product_id', 'id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'id');
    }
}
