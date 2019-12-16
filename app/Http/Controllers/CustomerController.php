<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CustomerController extends Controller
{
    public function all_customer(){
        $this->AdminAuthCheck();
        $all_customer=DB::table('customers')->get();
        return view('admin.all_customer',compact('all_customer'));
    }
    public function delete_customer($customer_id){
        DB::table('customers')->where('customer_id',$customer_id)->delete();
        Session::put('message','customer deleted successfully !!');
        return redirect()->back();
    }
    public function unactive($customer_id){
        DB::table('customers')->where('customer_id',$customer_id)->update(['status' => 0]);
        Session::put('message','customer unactived successfully !!');
        return redirect()->back();

    }
    public function active($customer_id){
        DB::table('customers')->where('customer_id',$customer_id)->update(['status' => 1]);
        Session::put('message','customer actived successfully !!');
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
