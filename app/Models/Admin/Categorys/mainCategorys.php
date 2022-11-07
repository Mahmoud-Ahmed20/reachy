<?php

namespace App\Models\Admin\Categorys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\products\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
class mainCategorys extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
    ];

    // relationship subCategory
    public function subCategory()
    {
        return $this->hasMany(subCategory::class,'main_category_id','id');
    }

    // relationship product
    public function product()
    {
        return $this->hasMany(product::class,'main_categorys_id','id');
    }




}
