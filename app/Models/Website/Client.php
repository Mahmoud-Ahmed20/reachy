<?php

namespace App\Models\Website;

use App\Models\Admin\Subscription;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Location\Country;

class Client extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'first_name',
        'second_name',
        'avatar',
        'phone',
        'Active',
        'gendar',
        'fov_poyment',
        'note',
        'gruop_id',
        'subuscription_id ',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function subuscription()
    {
        return $this->belongsTo(Subscription::class, 'subuscription_id', 'id');
    }
}
