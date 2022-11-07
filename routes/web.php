<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Branch\InvoiceController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\location\CountriesController;
use App\Http\Controllers\Admin\location\CityController;
use App\Http\Controllers\Admin\location\RegionController;
use App\Http\Controllers\Website\AdderssController;
use App\Http\Controllers\Admin\SupplyController;
use App\Http\Controllers\admin\SellerController;
use App\Http\Controllers\Website\ClientController;
use App\Http\Controllers\Admin\Categorys\mainCategoryController;
use App\Http\Controllers\Admin\Categorys\subCategoryController;
use App\Http\Controllers\Admin\Categorys\subsubCategoryController;
use App\Http\Controllers\Admin\products\brandController;
use App\Http\Controllers\Admin\products\productController;
use App\Http\Controllers\Website\Seller\AddProductController;
use App\Http\Controllers\Website\Seller\OrderController;
use App\Http\Controllers\Website\Seller\OrderItemController;
use App\Http\Controllers\Website\Seller\StockController;
use App\Http\Controllers\Admin\stationController;
use App\Http\Controllers\admin\BuyerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\subscriptionController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\LandingPage\SellersController;
use App\Http\Controllers\Website\Product_webController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Website\subscriptionWebsiteController;
use App\Http\Controllers\Patient\Cats\Resource_cat;
use App\Http\Controllers\Prox_setting;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Admin\OrderAdminController;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//----- important if we want to show the webview -----
Route::get('/', [ClientController::class, 'index'])->name('landing');


Route::get('/test', [Controller::class, 'test']);

/*
|--------------------------------------------------------------------------
| User interface (landing, login, register, profile)
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
|   Category page
|--------------------------------------------------------------------------
*/
Route::get('/main/category/{slug}', [CategoryController::class, 'main_category'])->name('main.category');
Route::get('/sub/category/{slug}', [CategoryController::class, 'sub_category'])->name('sub.category');
Route::get('/sub/sub/category/{slug}', [CategoryController::class, 'sub_sub_category'])->name('sub.sub.category');
Route::get('/other/category', [CategoryController::class, 'other_category'])->name('other.category');

Route::get('/show/product/{slug}', [ClientController::class, 'ShowProducts'])->name('products.show');
Route::get('/search/{slug}', [ClientController::class, 'search'])->name('products.search');
Route::post('/result-search/', [ClientController::class, 'ResultSearch'])->name('products.resultsearch');
Route::get('/brands/{slug}', [CategoryController::class, 'brands'])->name('brands');

Route::prefix('client')->name('client.')->group(function () {

    Route::middleware(['guest:client'])->group(function () {
        Route::get('/login', [ClientController::class, 'login'])->name('login')->middleware("throttle:10,2"); //it will send 10 request per 2 minute
        Route::post('/login_sub', [ClientController::class, 'login_sub'])->name('login_sub');
        Route::post('/store', [ClientController::class, 'store'])->name('store');
        Route::get('/createcityajax/{id}', [ClientController::class, 'createcityajax'])->name('createcityajax');
    });


    Route::middleware(['auth:client'])->group(function () {
        Route::post('/register_with_otp', [ClientController::class, 'register_with_otp'])->name('register_with_otp');
        Route::post('logout', [ClientController::class, 'logout'])->name('logout');
        Route::get('/not-active-client', [ClientController::class, 'active_client'])->name('active_client');
        Route::middleware(['auth', 'activeclient'])->group(function () {
            Route::get('/profile', [ClientController::class, 'profile'])->name('profile')->middleware("throttle:10,2"); //it will send 10 request per 2 minute
            Route::get('/profile/edit', [ClientController::class, 'edit_profile'])->name('edit_profile');
            Route::post('/profile/update', [ClientController::class, 'update'])->name('update.profile')->middleware("throttle:10,2");
            Route::get('order', [Product_webController::class, 'index'])->name('creat.order');
            Route::post('order/store', [Product_webController::class, 'order'])->name('order');
            Route::resource('/address', AdderssController::class);
            Route::get('/address/update-favorite/{id}', [AdderssController::class, 'update_favorite'])->name('update.favorite');
            Route::get('city-get-ajax/{id}', [AdderssController::class, 'city_get_ajax'])->name('city_get_ajax');
            Route::get('region-get-ajax/{id}', [AdderssController::class, 'region_get_ajax'])->name('region_get_ajax');
            Route::post('address/favorite-ajax/{id}', [AdderssController::class, 'favorite_ajax'])->name('favorite_ajax');
            Route::post('address/store-ajax', [AdderssController::class, 'store_ajax'])->name('store_ajax');
            Route::get('/current-requests', [ClientController::class, 'client_current_requests'])->name('current_requests');
            Route::get('/details-order/{code}', [ClientController::class, 'details_order'])->name('details_order');
            Route::get('/my-previous-orders', [ClientController::class, 'my_previous_orders'])->name('my_previous_orders');
            Route::delete('/delete-order', [ClientController::class, 'delete_order'])->name('delete_order');
            Route::resource('/subscriptionWebsite', subscriptionWebsiteController::class);
            Route::resource('/add-to-card', AddToCardController::class);
            Route::post('/wash-lists', [WashListController::class, 'store'])->name('wash-lists.index');

            Route::delete('/wash-lists-delete/{id}', [WashListController::class, 'destroy'])->name('wash-lists.destroy');

        });
    });
});

//for the auth user
Route::prefix('seller')->name('seller.')->group(function () {

    Route::middleware(['guest:seller'])->group(function () {
        Route::get('/login', [SellersController::class, 'login'])->name('login'); //it will send 10 request per 2 minute
        Route::post('/login_sub', [SellersController::class, 'login_sub'])->name('login_sub');
        Route::get('/register', [SellersController::class, 'register'])->name('register');
        Route::post('/store', [SellersController::class, 'store'])->name('store');
        Route::get('/', [SellersController::class, 'index'])->name('index');
        Route::get('/dashboard', [SellersController::class, 'dashboard'])->name('dashboard');
    });

    Route::middleware(['auth:seller'])->group(function () {
        Route::POST('logout', [SellersController::class, 'logout'])->name('logoutseller');
        Route::get('/not_active_seller', [SellersController::class, 'activeSeller'])->name('activeSeller');


        Route::middleware('auth', 'activeseller')->group(function () {
            Route::get('/sms_active', [SellersController::class, 'sms_active'])->name('sms_active');
            Route::get('/congratulation', [SellersController::class, 'congratulation'])->name('congratulation');
        });

        Route::middleware('auth', 'activeseller')->group(function () {
            Route::get('/seller_dashboard', [SellersController::class, 'seller_dashboard'])->name('seller_dashboard');
            Route::get('/edit_profile_seller', [SellersController::class, 'edit_profile_seller_dashboard'])->name('edit_profile_seller');
            Route::post('/edit_profile_seller', [SellersController::class, 'edit_profile_seller'])->name('edit_profile');
            Route::get('/order', [SellersController::class, 'order'])->name('orders');
            Route::get('/order_details/{id}', [SellersController::class, 'order_details'])->name('order_items');
            Route::get('/order_done', [SellersController::class, 'order_done'])->name('orders.done');
            Route::get('/order_details_done/{id}', [SellersController::class, 'order_details_done'])->name('order_items.done');
            Route::post('/order_item_update', [SellersController::class, 'order_item_update'])->name('order_item_update');
            Route::resource('stock', StockController::class);
            Route::get('stock_search/', [StockController::class, 'search'])->name('result_search');
            Route::get('/show/product/stock/{id}', [StockController::class, 'show_product_stock'])->name('show_product_stock');
            Route::get('/wallet_seller', [SellersController::class, 'wallet_seller'])->name('wallet_seller');
        });


    });
    Route::prefix('product')->group(function () {
        Route::get('/show_all_stocks', [AddProductController::class, 'show_all_product'])->name('show_all_product');
        Route::get('/show/seller_stock_details/{id}', [AddProductController::class, 'ShowProducts'])->name('ShowProducts');
        Route::get('/all_request_product', [AddProductController::class, 'show_all_request_product'])->name('show_all_request_product');
        Route::get('/search_product', [AddProductController::class, 'search_product'])->name('search_product');
        Route::get('/add_product', [AddProductController::class, 'add_product'])->name('add_product');
        Route::post('/store_add_product', [AddProductController::class, 'store_add_product'])->name('store_add_product');
        Route::get('/mangement_approval', [AddProductController::class, 'mangement_approval'])->name('mangement_approval');
        Route::get('/search/{slug}', [AddProductController::class, 'search'])->name('products.search');
        Route::post('result-search/', [AddProductController::class, 'resultSearch'])->name('products.resultsearch');
        Route::get('edit/{id}', [AddProductController::class, 'edit_prodct'])->name('product.edit');
        Route::post('update/{id}', [AddProductController::class, 'update_product'])->name('product.update');
        Route::delete('/destroy', [AddProductController::class, 'destroy_request'])->name('destroy.request');
    });


});



// -----------------------------------------
//for Proxima system

//multi languages
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::prefix('prox')->name('sett.')->group(function () {

            //for the guest
            Route::get('/', function () {
                return view('admin/auth.login');
            })->middleware('guest');

            Route::post('logout', [UsersController::class, 'logout'])->name('logout');
            Route::get('deactivate', [UsersController::class, 'deactivate'])->name('deactivate');

            Route::middleware(['auth', 'activeuser'])->group(function () {

            Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard_admin');
            Route::resource('/admin', UsersController::class);
            Route::get('/edit_profile_user', [UsersController::class, 'edit_profile_user'])->name('edit_profile_user');
            Route::get('/admin-search', [UsersController::class, 'search_admin'])->name('search.admin');
            Route::get('/admin/search-query/{slug}', [UsersController::class, 'search_query'])->name('search.query.admin');
            Route::PUT('/edit_profile_user_store', [UsersController::class, 'edit_profile_user_store'])->name('edit_profile_user_store');

            //note for the user in the dashboard
            Route::PATCH('/note_ajax', [UsersController::class, 'note_ajax'])->name('ad_note_ajax');

            Route::get('/createcityajax/{id}', [UsersController::class, 'createcityajax'])->name('createcityajax');



            /*
                |--------------------------------------------------------------------------
                | Route Create (Admin)
                |--------------------------------------------------------------------------
                */
                Route::group(['middleware' => ['role:Super-admin|Moderator']], function () {

                Route::prefix('buyre')->group(function () {
                Route::get('/index', [BuyerController::class, 'index'])->name('buyre.index');
                Route::get('/edit/{id}', [BuyerController::class, 'edit'])->name('edit_buyre');
                Route::post('/update/{id}', [BuyerController::class, 'update'])->name('update.buyre');
                Route::get('/show-orders/{id}', [BuyerController::class, 'Show_orders'])->name('ShowOrders.client');
                Route::get('/ordrer-item/{id}', [BuyerController::class, 'ordrer_item'])->name('ordrer.item.client');
                Route::get('/show/{id}', [BuyerController::class, 'show'])->name('show.client');
                Route::get('/show-all-client', [BuyerController::class, 'show_all_client'])->name('show.all.client');
                Route::get('/search/', [BuyerController::class, 'search'])->name('search.buyre');
                Route::get('/search-query/{slug}', [BuyerController::class, 'search_query'])->name('search.query.client');
            });
            });


                Route::prefix('order')->group(function () {
                    Route::get('/inprogress', [OrderAdminController::class, 'inprogress'])->name('status_inprogress');
                    Route::get('/inprogress_item/{id}', [OrderAdminController::class, 'inprogress_item'])->name('status_inprogress_item');
                    Route::get('/out_for_delivery', [OrderAdminController::class, 'out_for_delivery'])->name('out_for_delivery');
                    Route::get('/out_for_delivery_item/{id}', [OrderAdminController::class, 'out_for_delivery_item'])->name('out_for_delivery_item');
                    Route::get('/deliverd', [OrderAdminController::class, 'deliverd'])->name('deliverd');
                    Route::get('/deliverd_item/{id}', [OrderAdminController::class, 'deliverd_item'])->name('deliverd_item');
                    Route::get('/order/search', [OrderAdminController::class, 'search'])->name('order.search');
                    Route::get('/order/search-query/{slug}', [OrderAdminController::class, 'search_query'])->name('query.search.order');
                });
            /*
                |--------------------------------------------------------------------------
                | Route Seller (admin)
                |--------------------------------------------------------------------------
                */
            Route::prefix('seller')->group(function () {
                Route::get('/index', [SellerController::class, 'index'])->name('admin.seller.index');
                Route::get('/create', [SellerController::class, 'create'])->name('create.seller');
                Route::post('/store', [SellerController::class, 'store'])->name('store.seller');
                Route::get('/edit/{id}', [SellerController::class, 'edit'])->name('edit_seller');
                Route::post('/update/{id}', [SellerController::class, 'update'])->name('update.seller');
                Route::delete('/destroy/{id}', [SellerController::class, 'destroy'])->name('destroy.seller');
                Route::get('/show/{id}', [SellerController::class, 'show'])->name('show.seller');
                Route::get('/search/', [SellerController::class, 'search'])->name('search.seller');
                Route::get('/search-query/{slug}', [SellerController::class, 'search_query'])->name('search.query.seller');
            });



                Route::group(['middleware' => ['role:Super-admin|Delivery']], function () {
                    Route::get('/delivery', [DeliveryController::class, 'delivery'])->name('delivery.index');
                    Route::get('/delivery/ordrer-item/{id}', [DeliveryController::class, 'ordrer_item'])->name('ordrer.item.index');
                    Route::post('/delivery/dlevery-update-status', [DeliveryController::class, 'dlevery_update_status'])->name('dlevery.update.status');
                    Route::get('/delivery/dlevery-recive-refund', [DeliveryController::class, 'dlevery_recive_refund'])->name('dlevery.recive.refund');
                    Route::get('/delivery/done-order', [DeliveryController::class, 'done_order'])->name('done.order');
                });

             Route::group(['middleware' => ['role:Super-admin|Data-entry']], function () {
                 /*
                |--------------------------------------------------------------------------
                | Route slider (admin)
                |--------------------------------------------------------------------------
                */
                Route::prefix('slider')->group(function () {
                    Route::get('/index', [SliderController::class, 'index'])->name('slider.index');
                    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit.slider');
                    Route::post('/update/{id}', [SliderController::class, 'update'])->name('update.slider');
                    Route::delete('/destroy/{id}', [SliderController::class, 'destroy'])->name('destroy.slider');
                });

                /*
                    |--------------------------------------------------------------------------
                    | location
                    |--------------------------------------------------------------------------
                    */
                //-----------------start countries-----------------------
                Route::get('/location/countries', [CountriesController::class, 'index'])->name('countries.index');
                Route::get('/location/countries/create', [CountriesController::class, 'create'])->name('countries.create');
                Route::post('/location/countries/store', [CountriesController::class, 'store'])->name('countries.store');
                Route::get('/location/countries/edit/{id}', [CountriesController::class, 'edit'])->name('countries.edit');
                Route::post('/location/countries/update/{id}', [CountriesController::class, 'update'])->name('countries.update');
                Route::delete('/location/countries/destroy/{id}', [CountriesController::class, 'destroy'])->name('countries.destroy');
                //-----------------end countries-----------------------

                //-----------------start city-----------------------
                Route::get('/location/city', [CityController::class, 'index'])->name('city.index');
                Route::get('/location/city/create', [CityController::class, 'create'])->name('city.create');
                Route::get('/location/city/edit/{id}', [CityController::class, 'edit'])->name('city.edit');
                Route::post('/location/city/store', [CityController::class, 'store'])->name('city.store');
                Route::post('/location/city/update/{id}', [CityController::class, 'update'])->name('city.update');
                Route::delete('/location/city/destroy/{id}', [CityController::class, 'destroy'])->name('city.destroy');
                //-----------------end city-----------------------
                //-----------------start Region-----------------------
                Route::get('/location/region', [RegionController::class, 'index'])->name('region.index');
                Route::get('/location/region/create', [RegionController::class, 'create'])->name('region.create');
                Route::get('/location/region/edit/{id}', [RegionController::class, 'edit'])->name('region.edit');
                Route::post('/location/region/store', [RegionController::class, 'store'])->name('region.store');
                Route::post('/location/region/update/{id}', [RegionController::class, 'update'])->name('region.update');
                Route::delete('/location/region/destroy/{id}', [RegionController::class, 'destroy'])->name('region.destroy');
                //-----------------end Region-----------------------



            /*
                |--------------------------------------------------------------------------
                | mainCategory
                |--------------------------------------------------------------------------
                */
            Route::resource('/Category/mainCategory', mainCategoryController::class);

            /*
                |--------------------------------------------------------------------------
                | subCategory
                |--------------------------------------------------------------------------
                */
            Route::resource('/Category/subCategory', subCategoryController::class);
            /*
                |--------------------------------------------------------------------------
                | subsubCategory
                |--------------------------------------------------------------------------
                */
            Route::resource('/Category/subsubCategory', subsubCategoryController::class);
            /*
                |--------------------------------------------------------------------------
                | Brand
                |--------------------------------------------------------------------------
                */
            Route::resource('brand', brandController::class);
            /*
                |--------------------------------------------------------------------------
                | product
                |--------------------------------------------------------------------------
                */
                Route::resource('product', productController::class);
                Route::get('/product/deleteImage/{id}', [productController::class, 'deleteImage'])->name('deleteImage');
                Route::get('/sub-catgory-ajax/{id}', [ProductController::class, 'sub_catgory_ajax'])->name('sub_catgory_ajax');
                Route::get('/sub-sub-catgory-ajax/{id}', [ProductController::class, 'sub_sub_catgory_ajax'])->name('sub_sub_catgory_ajax');
                Route::get('/search/', [ProductController::class, 'search'])->name('search.product');
                Route::get('/search-query/{slug}', [ProductController::class, 'search_query'])->name('search.query.product');
                //Tags and product tags
                Route::resource('tags', TagsController::class);
                Route::get('tag-prodect', [TagsController::class, 'tagcreate'])->name('Tag-product');
                Route::post('/tagProductstore', [TagsController::class, 'tagProductstore'])->name('tagProductstore');
            /*
                |--------------------------------------------------------------------------
                | Subscription
                |--------------------------------------------------------------------------
                */
            Route::resource('subscription', subscriptionController::class);
        });

            /*
                |--------------------------------------------------------------------------
                | Stocks
                |--------------------------------------------------------------------------
                */
            Route::resource('supply', SupplyController::class);
            /*
                |--------------------------------------------------------------------------
                | stations
                |--------------------------------------------------------------------------
                */
        Route::group(['middleware' => ['role:Super-admin|Station']], function () {

            Route::resource('stations', stationController::class);
            // new Mohamed Elshimy
            Route::prefix('order')->group(function () {
                Route::get('/show_all_orders', [stationController::class, 'show_all_orders'])->name('show_all_orders');
                Route::get('/show_all_details/{id}', [stationController::class, 'show_all_orders_details'])->name('show_all_details');
                Route::post('/update_all_details/{id}', [stationController::class, 'update_status'])->name('update_status');
                Route::post('/update_all_orders/{id}', [stationController::class, 'update_status_order'])->name('update_status_order');
                Route::get('order_details/{id}', [stationController::class, 'steation_order_details'])->name('station_order_details');
                Route::post('/order_details_cancel', [stationController::class, 'order_details_cancel'])->name('order_details_cancel');
                Route::post('/order_details_refund', [stationController::class, 'order_details_refund'])->name('order_details_refund');
            });
            });
        });
        });

        require __DIR__ . '/auth.php';
    }
);
