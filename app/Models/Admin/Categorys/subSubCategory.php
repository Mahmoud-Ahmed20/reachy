<?php

namespace App\Models\Admin\Categorys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\products\Product;
class subSubCategory extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'sub_category_id',
    ];

   public function subCategory()
    {
        return $this->belongsTo(subCategory::class,'sub_category_id','id');
    }
    public function product()
    {
        return $this->hasMany(product::class,'sub_sub_category_id','id');
    }



}