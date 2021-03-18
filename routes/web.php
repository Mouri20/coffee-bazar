<?php
use App\City;
use App\ShopType;
use App\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/','User\HomeController@home');
Route::get('search-result','User\HomeController@search_shop');
Route::get('city-wise/coffee-shop/{id}/{slug}','User\HomeController@city_wise');
Route::get('shop-wise/coffee/{id}/{slug}','User\HomeController@type_wise');
Route::group(['middleware' => ['auth','verified']],function(){

    //user
    Route::get('user-dashboard',function(){
        $table = ShopType::where('user_id',Auth::user()->id)->get();
        return view('profile',compact('table'));
    });

    Route::post('user/profile/update','User\HomeController@profile_up');

    Route::get('single_Shop/{id}/{slug}','User\HomeController@singleshop');
    Route::get('add-coffee/{id}/{slug}','User\HomeController@add_coffee');
    Route::post('add-coffee/store','User\HomeController@store_coffee');

    Route::get('user/upload-post-page','User\AdController@upload_page');
    Route::post('user/upload-post','User\AdController@store_ad');
    Route::get('user/delete-post/{id}','User\AdController@del_ad');
    Route::get('user/delete-all-post','User\AdController@del_all');


    Route::group(['middleware' => 'admin'],function(){
    // admin
            Route::get('/admin', function () {
                $cities = City::all();
                return view('admin.dashboard',compact('cities'));
            });

            Route::post('city-create','Admin\CityController@store');
            Route::post('city-update','Admin\CityController@edit');
            Route::get('city-delete/{id}','Admin\CityController@del');


            Route::get('coffee-shop-list','Admin\ShopTypeController@index');
            Route::get('coffee-shop-wise-coffee','Admin\ShopTypeController@shop_wise_coffee');
            Route::post('shoptype-create','Admin\ShopTypeController@store');
            Route::post('shoptype-update','Admin\ShopTypeController@edit');
            Route::get('shoptype-delete/{id}','Admin\ShopTypeController@del');


            Route::get('user-list','Admin\UserController@index');
            Route::get('user-make/admin/{id}','Admin\UserController@make_admin');
            Route::get('user-make/user/{id}','Admin\UserController@make_user');
    });
    
        
        
});


Route::get('/city-wise-addvertisement', function () {
    return view('citywise');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
