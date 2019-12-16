<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CategoryController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_category');
    }
    public function all_category(){
        $this->AdminAuthCheck();
        $all_categories=DB::table('categories')->get();
        return view('admin.all_category',compact('all_categories'));
    }
    public function save_catgory(Request $request){
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        DB::table('categories')->insert($data);
        Session::put('message','category added successfully !!');
        return redirect()->back();
    }
    public function edit_category($category_id){
        $this->AdminAuthCheck();
        $category=DB::table('categories')->where('id',$category_id)->first();
        return view('admin.edit_category',compact('category'));
    }
    public function update_category(Request $request,$category_id){
        DB::table('categories')->where('id',$category_id)
            ->update([
                'category_name'=>$request->category_name,
                'category_description'=>$request->category_description
            ]);
        Session::put('message','category updated successfully !!');
        return redirect()->back();
    }
    public function delete_category($category_id){
        DB::table('categories')->where('id',$category_id)->delete();
        Session::put('message','category deleted successfully !!');
        return redirect()->back();
    }
    public function unactive($category_id){
        DB::table('categories')->where('id',$category_id)->update(['publication_status' => 0]);
        Session::put('message','category unactived successfully !!');
        return redirect()->back();

    }
    public function active($category_id){
        DB::table('categories')->where('id',$category_id)->update(['publication_status' => 1]);
        Session::put('message','category actived successfully !!');
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
