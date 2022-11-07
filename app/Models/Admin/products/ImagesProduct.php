<?php

namespace App\Models\Admin\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ImagesProduct extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable = [
        'id',
        'name_img',
        'product_id',
    ];

    public function images_product()
    {
        return $this->belongsTo(product::class,'product_id','id');
    }

}