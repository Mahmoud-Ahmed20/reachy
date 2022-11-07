<?php

namespace App\Models\Website;

use App\Models\Admin\Address;
use App\Models\Admin\Station;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'id',
        'sub_total',
        'solid_price',
        'total_price',
        'total_tax',
        'final_price',
        'code',
        'status',
        'discount',
        'coupon_id',
        'client_note',
        'arrived_date',
        'confirm_date',
        'out_delivery_date',
        'deliverd_date',
        'refand_date',
        'cancel_date',
        'refand_reasone',
        'gift',
        'original_price',
        'client_id',
        'delivery_id',
        'station_id',
        'address_id',

    ];



    // relationship Orders
    public function order_item()
    {
        return $this->hasMany(Order_item::class, 'order_id', 'id');
    }

    // relationship Orders
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    // relationship Orders
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}