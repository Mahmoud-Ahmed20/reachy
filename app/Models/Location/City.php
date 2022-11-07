<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\location\Country;
use Illuminate\Database\Eloquent\SoftDeletes;


class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'country_id',
    ];

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function Region()
    {
        return $this->hasMany(Region::class, 'city_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'city_id');
    }

    public function addres()
    {
        return $this->hasMany(Address::class, 'city_id', 'id');
    }
}
