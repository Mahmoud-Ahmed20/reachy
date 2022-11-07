<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
    ];

    public function city()
    {
        return $this->hasMany(city::class, 'country_id', 'id');
    }
    public function users()
    {

        return $this->hasMany(User::class, 'country_id', 'id');
    }
    public function client()
    {
        return $this->hasMany(Client::class, 'country_id', 'id');
    }

    public function addres()
    {
        return $this->hasMany(Address::class, 'id', 'country_id');
    }
}