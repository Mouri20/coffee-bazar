<?php

namespace App\Http\Controllers\User;
use App\City;
use App\ShopType;
use App\Ad;
use Str;
use App\User;
use App\Coffee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search_shop(Request $request)
    {
        $searchKey = $request->serachkey;
        $cities = City::all();
        $table = ShopType::query()
       ->where('name', 'LIKE', "%{$searchKey}%")->get();

       return view('search',compact('table','cities','searchKey'));
    }

    public function profile_up(Request $request)
     {
         $table = User::find($request->id);
         $table->name = $request->name;
         $table->email = $request->email;
         $image = $request->image;
        if ($request->hasFile('image')) {
            $extension = $image->extension();
            $fileName = Str::slug($request->name,'_').'_'.md5(date('Y-m-d h:i:s'));
            $fileName = $fileName.'.'.$extension;
            $table->image = $fileName;

            $image->move('uploads/profile',$fileName);
        }
        $table->save();
        return back();
     }

    public function home() {
        $types = ShopType::all();
        $cities = City::all();
        return view('welcome',compact('types','cities'));
    }

    public function city_wise($id = null){
       $city = City::find($id);
       $cities = City::all();
       $table = ShopType::where('city_id',$id)->get();
       return view('citywise',compact('cities','table','city'));
    }
    public function type_wise($id = null){
        $shoptypes = ShopType::all();
        $ShopType = ShopType::find($id);
        $cities = City::all();
        $table = Coffee::where('shop_type_id',$id)->get();
        return view('typewise',compact('cities','table','shoptypes','ShopType'));
     }

     public function singleshop($id)
     {
        $table = ShopType::find($id);
        $coffees = Coffee::where('shop_type_id',$id)->get();
        return view('singleshop',compact('table','coffees'));
     }
     public function add_coffee($id)
    {
        $table = ShopType::find($id);
        return view('add-coffee',compact('table'));
    }

    public function store_coffee(Request $request){
      //dd($request->all());
      $table = new Coffee();
      $table->name = $request->name;
      $table->shop_type_id = $request->shop_type_id;
      $table->price = $request->price;
      $table->description = $request->description;
      $image = $request->image;
      if ($request->hasFile('image')) {
          $extension = $image->extension();
          $fileName = Str::slug($request->name,'_').'_'.md5(date('Y-m-d h:i:s'));
          $fileName = $fileName.'.'.$extension;
          $table->image = $fileName;

          $image->move('uploads/coffee',$fileName);
      }
      $table->save();

      return back()->with(['message' => 'success']);
  }
}
