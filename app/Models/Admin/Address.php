<?php

namespace App\Models\Admin;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Region;
use App\Models\Website\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'favorite_address',
        'name_street',
        'address_details',
        'apartment_number',
        'building_number',
        'phone',
        'country_id',
        'city_id',
        'region_id',
        'client_id',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class,  'country_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,  'city_id', 'id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class,  'region_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class,  'client_id', 'id');
    }
}
