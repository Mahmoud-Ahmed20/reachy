<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\products\Product;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'client_id',
        'product_id',
    ];
    public function Client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}