<?php

namespace App\Models\Admin\Categorys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\products\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
class subCategory extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'main_category_id',
    ];

   public function mainCategory()
    {
        return $this->belongsTo(mainCategorys::class,'main_category_id','id');
    }
     public function subsubCategory()
    {
        return $this->hasMany(subsubCategory::class,'sub_category_id','id');
    }
     public function product()
    {
        return $this->hasMany(product::class,'sub_categories_id','id');
    }




}
