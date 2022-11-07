<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\products\Product;
class Brand extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'logo',
    ];


    public function product()
    {
        return $this->hasMany(product::class,'brand_id','id');
    }


}