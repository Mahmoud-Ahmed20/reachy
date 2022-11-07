<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\products\product;
use App\Models\Admin\Seller_stock;
use App\Models\Partners\Seller;

class Verification_code extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'id',
        'client_id',
        'otp',
        'expire_at',
    ];


    // relationship seller
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

}