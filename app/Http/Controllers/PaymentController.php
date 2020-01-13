<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class PaymentController extends Controller
{
    public function all_payment(){
        $this->AdminAuthCheck();
        $all_payment=DB::table('payments')->get();
        return view('admin.all_payment',compact('all_payment'));
    }
    public function delete_payment($payment_id){
        DB::table('payments')->where('payment_id',$payment_id)->delete();
        Session::put('message','payment deleted successfully !!');
        return redirect()->back();
    }
    public function pending($payment_id){
        DB::table('payments')->where('payment_id',$payment_id)->update(['payment_status' => 'pending']);
        Session::put('message','pending payment successfully !!');
        return redirect()->back();

    }
    public function accepted($payment_id){
        DB::table('payments')->where('payment_id',$payment_id)->update(['payment_status' => 'accepted']);
        Session::put('message','accepted payment successfully !!');
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
