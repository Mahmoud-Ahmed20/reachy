<?php

namespace App\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use  HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'id',
        'image',
        'url',
        'type',
    ];
}