<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class OrderController extends Controller
{
    public function manage_order(){
        $this->AdminAuthCheck();
        $all_orders=DB::table('orders')
            ->Join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->Join('shippings', 'orders.shipping_id', '=', 'shippings.shipping_id')
            ->Join('payments', 'orders.payment_id', '=', 'payments.payment_id')
            ->select('orders.*','customers.customer_name','shippings.first_name','shippings.last_name','payments.payment_method')
            ->get();
        return view('admin.manageorder',compact('all_orders'));
    }

    public function delete_order($order_id){
        DB::table('orders')->where('order_id',$order_id)->delete();
        DB::table('order_details')->where('order_id',$order_id)->delete();
        Session::put('message','order deleted successfully !!');
        return redirect()->back();
    }

    public function rejected($order_id){
        DB::table('orders')->where('order_id',$order_id)->update(['order_status' => 'rejected']);
        Session::put('message','order rejected successfully !!');
        return redirect()->back();

    }
    public function accepted($order_id){
        DB::table('orders')->where('order_id',$order_id)->update(['order_status' => 'accepted']);
        Session::put('message','order accepted successfully !!');
        return redirect()->back();
    }
    public function view_order($order_id){
        $this->AdminAuthCheck();
        $order_view=DB::table('orders')
            ->Join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            //->Join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->Join('shippings', 'orders.shipping_id', '=', 'shippings.shipping_id')
            ->select('orders.*','customers.*','shippings.*')
            //,'orders.order_total','order_details.*'
            ->where('order_id',$order_id)
            ->first();
        $orders=DB::table('order_details')
            ->where('order_id',$order_id)
            ->get();
        return view('admin.view_order',compact('order_view','orders'));
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
