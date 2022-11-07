<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\products\SubPrices;
use App\Models\Website\Client;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'description_ar',
        'description_en',
        'amount_money',
        'expire',
        'limited_cost',
        'active',
        'img',
    ];

    public function sub_prices()
    {
        return $this->hasMany(SubPrices::class,  'subscription_id', 'id');
    }
    public function client()
    {
        return $this->hasMany(Client::class,  'subuscription_id', 'id');
    }
}