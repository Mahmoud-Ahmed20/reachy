<?php

namespace App\Models\Admin\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Subuscription;

class Price extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'price',
        'subuscription_id'
    ];


    public function product()
    {
        return $this->hasMany(product::class, 'price_to_be_shown_id', 'id');
    }



    public function subuscription()
    {
        return $this->hasMany(Subuscription::class, 'subuscription_id', 'id');
    }
}