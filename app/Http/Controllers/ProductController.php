<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ProductController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $categories=DB::table('categories')->where('publication_status',1)->get();
        $brands=DB::table('manufactures')->where('publication_status',1)->get();
        return view('admin.add_product',compact('categories','brands'));
    }
    public function all_product(){
        $this->AdminAuthCheck();
        $all_products=DB::table('products')
            ->Join('categories', 'products.category_id', '=', 'categories.id')
            ->Join('manufactures', 'products.manufacture_id', '=', 'manufactures.id')
            ->select('products.*','categories.category_name','manufactures.manufacture_name')
            ->get();
        return view('admin.all_product',compact('all_products'));
    }
    public function save_product(Request $request){
        $data=array();
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_name']=$request->product_name;
        $data['short_description']=$request->short_description;
        $data['long_description']=$request->long_description;
        $data['price']=$request->price;
        $data['size']=$request->size;
        $data['color']=$request->color;
        $data['publication_status']=$request->publication_status;
        $image=$request->file('image');
        if ($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name. '.' .$ext;
            $upload_path='images/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success){
                $data['image']=$image_url;
                DB::table('products')->insert($data);
                Session::put('message','product added successfully !!');
                return redirect()->back();
            }
        }
        $data['image']='';
        DB::table('products')->insert($data);
        Session::put('message','product added successfully !!');
        return redirect()->back();
    }
    public function delete_product($product_id){
        DB::table('products')->where('id',$product_id)->delete();
        Session::put('message','product deleted successfully !!');
        return redirect()->back();
    }
    public function unactive($product_id){
        DB::table('products')->where('id',$product_id)->update(['publication_status' => 0]);
        Session::put('message','product unactived successfully !!');
        return redirect()->back();

    }
    public function active($product_id){
        DB::table('products')->where('id',$product_id)->update(['publication_status' => 1]);
        Session::put('message','product actived successfully !!');
        return redirect()->back();
    }

    public function AdminAuthCheck(){
        $admin_id=Session::get('id');
        if ($admin_id){
            return;
        }
        else{
            return Redirect::to('/admin')->send();
        }
    }
}
