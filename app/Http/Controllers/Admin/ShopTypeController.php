<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShopType;
use App\Coffee;
use Str;
class ShopTypeController extends Controller
{
    public function index()
    {
        $types = ShopType::all();
        return view('admin.coffee-shop',compact('types'));
    }

    public function shop_wise_coffee(Request $request)
     {
         $table = Coffee::where('shop_type_id',$request->shop_type_id)->orderBy('created_at','DESC')->get();
         return view('admin.show',compact('table'));
     }

    public function store(Request $request)
    {
        //dd($request->all());
        $table = new ShopType();
        $table->name = $request->name;
        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $fileName = Str::slug($request->name,'_').'_'.md5(date('Y-m-d h:i:s'));
            $fileName = $fileName.'.'.$extension;

            $table->image = $fileName;

            $request->image->move('uploads/shoptype',$fileName);
        }
        $table->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $table = ShopType::find($request->id);
        $table->name = $request->name;

        if ($request->hasFile('image')) {

            $path = public_path('uploads/shoptype/'.$table->image);
            if (file_exists($path)) {
                unlink($path);
            }

            $extension = $request->image->extension();
            $fileName = Str::slug($request->name,'_').'_'.md5(date('Y-m-d h:i:s'));
            $fileName = $fileName.'.'.$extension;

            $table->image = $fileName;

            $request->image->move('uploads/shoptype',$fileName);
        }
        $table->save();
        return redirect()->back();
    }

    public function del($id)
    {
        $table = ShopType::find($id);

        $path = public_path('uploads/shoptype/'.$table->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $table->coffee()->delete();
        $table->delete();
        return redirect()->back();
    }
}
