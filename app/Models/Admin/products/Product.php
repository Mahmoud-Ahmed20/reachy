<?php

namespace App\Models\Admin\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Categorys\mainCategorys;
use App\Models\Admin\Categorys\subCategory;
use App\Models\Admin\Categorys\subSubCategory;
use App\Models\Admin\Brand;
use App\Models\Admin\Seller_stock;
use App\Models\Website\Order_item;
use App\Models\Admin\Supply;
use App\Models\Website\Wishlist;
use App\Models\Admin\products\SubPrices;
use App\Models\Partners\Seller;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'description_ar',
        'description_en',
        'code',
        'sku',
        'orginal_price',
        'subscription_price',
        'tax',
        'gift',
        'cover_image',
        'status',
        'seller_id',
        'admin_id',
        'main_categorys_id',
        'sub_categories_id',
        'sub_sub_category_id',
        'price_to_be_shown_id',
        'brand_id',
        'inactive',
        'today_offer',
        'supermarket_offer',
        'discount',
        'baby_Offers',
        'Health_beauty_offers',

    ];

    // relationship seller
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'id');
    }

    // relationship maincategory
    public function main_category()
    {
        return $this->belongsTo(mainCategorys::class, 'main_categorys_id', 'id');
    }
    // relationship subcategory
    public function sub_category()
    {
        return $this->belongsTo(subCategory::class, 'sub_categories_id', 'id');
    }
    // relationship subsubcategory

    public function sub_sub_category()
    {
        return $this->belongsTo(subSubCategory::class, 'sub_sub_category_id', 'id');
    }

    // relationship admin table users and product

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    // relationship image
    public function Productimg()
    {
        return $this->hasMany(ImagesProduct::class, 'product_id', 'id');
    }

    // relationship brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    // relationship brand
    public function price()
    {
        return $this->belongsTo(Price::class, 'price_to_be_shown_id', 'id');
    }

    // relationship seller stock
    public function seller_stocks()
    {
      return $this->hasMany(Seller_stock::class, 'product_id','id');
    }

    // relationship Supply
    public function supply()
    {
        return $this->belongsTo(Supply::class, 'product_id', 'id');
    }

    // relationship sub_price
    public function sub_prices()
    {
        return $this->hasMany(SubPrices::class,  'product_id', 'id');
    }

    // relationship Orders
   public function order_item()
   {
       return $this->hasMany(Order_item::class, 'product_id', 'id');
   }

   public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }
    
}
