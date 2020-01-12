<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class CartController extends Controller
{
    public function show_cart(){
        $categories=DB::table('categories')
                ->where('publication_status',1)
                ->get();
        return view('pages.add_to_cart',compact('categories'));
    }
    public function add_to_cart(Request $request){
        $qty=$request->quantity;
        $product_id=$request->product_id;
        $product_info=DB::table('products')
                        ->where('id',$product_id)
                        ->first();
        $data['qty']=$qty;
        $data['id']=$product_info->id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->price;
        $data['options']['image']=$product_info->image;
        Cart::add($data);
        return redirect('/show-cart');
    }
    public function delete_cart($row_id){
//  or      Cart::update($row_id,0);
        Cart::remove($row_id);
        return redirect('/show-cart');
    }
    public function cart_decr($row_id,$quantity){
        Cart::update($row_id,$quantity - 1);
        return redirect()->back();
    }
    public function cart_incr($row_id,$quantity){
        Cart::update($row_id,$quantity + 1);
        return redirect()->back();
    }
    // public function update_cart(Request $request){
    //     $qty=$request->quantity;
    //     $row_id=$request->rowId;
    //     Cart::update($row_id,$qty);
    //     return redirect()->back();
    // }
}
