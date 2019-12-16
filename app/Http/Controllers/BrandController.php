<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class BrandController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_brand');
    }
    public function all_brand(){
        $this->AdminAuthCheck();
        $all_brands=DB::table('manufactures')->get();
        return view('admin.all_brand',compact('all_brands'));
    }
    public function save_brand(Request $request){
        $data=array();
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;
        $data['publication_status']=$request->publication_status;
        DB::table('manufactures')->insert($data);
        Session::put('message','brand added successfully !!');
        return redirect()->back();
    }
    public function edit_brand($brand_id){
        $this->AdminAuthCheck();
        $brand=DB::table('manufactures')->where('id',$brand_id)->first();
        return view('admin.edit_brand',compact('brand'));
    }
    public function update_brand(Request $request,$brand_id){
        DB::table('manufactures')->where('id',$brand_id)
            ->update([
                'manufacture_name'=>$request->manufacture_name,
                'manufacture_description'=>$request->manufacture_description
            ]);
        Session::put('message','brand updated successfully !!');
        return redirect()->back();
    }
    public function delete_brand($brand_id){
        DB::table('manufactures')->where('id',$brand_id)->delete();
        Session::put('message','brand deleted successfully !!');
        return redirect()->back();
    }
    public function unactive($brand_id){
        DB::table('manufactures')->where('id',$brand_id)->update(['publication_status' => 0]);
        Session::put('message','brand unactived successfully !!');
        return redirect()->back();

    }
    public function active($brand_id){
        DB::table('manufactures')->where('id',$brand_id)->update(['publication_status' => 1]);
        Session::put('message','brand actived successfully !!');
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
