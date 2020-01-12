<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ReviewController extends Controller
{
    public function all_review(){
        $this->AdminAuthCheck();
        $all_review=DB::table('reviews')
            ->join('products','reviews.product_id','=','products.id')
            ->select('reviews.*','products.product_name')
            ->get();
        return view('admin.all_review',compact('all_review'));
    }
    public function delete_review($review_id){
        DB::table('reviews')->where('id',$review_id)->delete();
        Session::put('message','review deleted successfully !!');
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
