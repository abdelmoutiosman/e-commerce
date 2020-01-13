<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home_content');
    }
    public function show_product_category($category_id){
        $products_category=DB::table('products')
            ->Join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*','categories.category_name')
            ->where('category_id',$category_id)
            ->where('products.publication_status',1)
            ->limit(9)
            ->get();
        return view('pages.product_by_category',compact('products_category'));
    }
    public function show_product_brand($brand_id){
        $products_brand=DB::table('products')
            ->Join('manufactures', 'products.manufacture_id', '=', 'manufactures.id')
            ->select('products.*','manufactures.manufacture_name')
            ->where('manufacture_id',$brand_id)
            ->where('products.publication_status',1)
            ->limit(5)
            ->get();
        return view('pages.product_by_brand',compact('products_brand'));
    }
    public function show_product($product_id){
        $product=DB::table('products')
            ->Join('categories', 'products.category_id', '=', 'categories.id')
            ->Join('manufactures', 'products.manufacture_id', '=', 'manufactures.id')
            ->select('products.*','categories.category_name','manufactures.manufacture_name')
            ->where('products.id',$product_id)
            ->where('products.publication_status',1)
            ->first();
        return view('pages.view_product',compact('product'));
    }
    public function all_product(){
        $all_product=DB::table('products')
            ->Join('categories', 'products.category_id', '=', 'categories.id')
            ->Join('manufactures', 'products.manufacture_id', '=', 'manufactures.id')
            ->select('products.*','categories.category_name','manufactures.manufacture_name')
            ->where('products.publication_status',1)
            ->paginate(5);
        return view('pages.all_product',compact('all_product'));
    }
    public function show_contact(){
        $setting=DB::table('settings')->find(1);
        return view('pages.contact_us',compact('setting'));
    }
    public function add_contact(Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['title']=$request->title;
        $data['body']=$request->body;
        DB::table('contacts')->insert($data);
        return redirect()->back();
    }
    public function add_review(Request $request){
        $product_id=$request->product_id;
        $data=array();
        $data['product_id']=$product_id;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['body']=$request->body;
        $data['rating']=$request->rating;
        DB::table('reviews')->insert($data);
        return redirect()->back();
    }
}
