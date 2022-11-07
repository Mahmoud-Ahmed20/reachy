<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'city_id',
    ];


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function addres()
    {
        return $this->hasMany(Address::class, 'id', 'region_id');
    }
}
