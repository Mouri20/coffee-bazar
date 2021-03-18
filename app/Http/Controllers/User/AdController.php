<?php

namespace App\Http\Controllers\User;
use App\City;
use App\ShopType;
use App\Ad;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
class AdController extends Controller
{
    public function upload_page()
    {
        $cities = City::all();
        $types = ShopType::all();
        return view('upload-page',compact('cities','types'));
    }

    public function store_ad(Request $request){
        //dd($request->all());
        $table = new ShopType();
        $table->name = $request->name;
        $table->address = $request->address;
        $table->website = $request->website;
        $table->city_id = $request->city_id;
        $table->contactNo = $request->contactNo;
        $table->avilability = $request->avilability;
        $table->description = $request->description;
        $image = $request->image;
        if ($request->hasFile('image')) {
            $extension = $image->extension();
            $fileName = Str::slug($request->name,'_').'_'.md5(date('Y-m-d h:i:s'));
            $fileName = $fileName.'.'.$extension;
            $table->image = $fileName;

            $image->move('uploads/shoptype',$fileName);
        }
        $table->user_id = Auth::user()->id;
        $table->save();

        return redirect('user-dashboard')->with(['message' => 'success']);
    }


    public function del_ad($id)
    {
        $table = ShopType::find($id);
        $table->coffee()->delete();
        $table->delete();
        return redirect()->back();
    }

    public function del_all(){
        ShopType::where('user_id',Auth::user()->id)->delete();
        return redirect()->back();
    }
}
