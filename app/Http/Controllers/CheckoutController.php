<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function checkout(){
        $this->CustomerAuthCheck();
        return view('pages.checkout');
    }
    public function login_checkout(){
        return view('pages.login');
    }

    public function customer_register(Request $request){
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['email_address']=$request->email_address;
        $data['password']=md5($request->password);
        $data['telephone']=$request->telephone;
        $customer_id=DB::table('customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return redirect(url('/'));
    }
    public function customer_login(Request $request){
        $customer_email=$request->email_address;
        $customer_password=md5($request->password);
        $result=DB::table('customers')
            ->where('email_address',$customer_email)
            ->where('password',$customer_password)
            ->first();
        if($result){
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/');
        }
        else{
            Session::put('message','email or password invalid');
            return Redirect::to('/login-checkout');
        }
    }
    public function account($customer_id){
        $this->CustomerAuthCheck();
        $customer=DB::table('customers')->where('customer_id',$customer_id)->first();
        return view('pages.account',compact('customer'));
    }
    public function edit_profile(Request $request,$customer_id){
        DB::table('customers')->where('customer_id',$customer_id)
            ->update([
                'customer_name'=>$request->customer_name,
                'email_address'=>$request->email_address,
                'telephone'=>$request->telephone,
            ]);
        Session::put('messages','account updated successfully !!');
        return redirect()->back();
    }
    public function edit_password(Request $request,$customer_id)
    {
        DB::table('customers')->where('customer_id',$customer_id)
            ->update([
                'password'=>md5($request->password)
            ]);
        Session::put('message','password updated successfully !!');
        return redirect()->back();
    }

    public function save_shipping(Request $request){
        $data=array();
        $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['mobile']=$request->mobile;
        $data['city']=$request->city;
        $shipping_id=DB::table('shippings')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return redirect(url('/payment'));
    }
    public function payment(){
        $this->CustomerAuthCheck();
        return view('pages.payment');
    }
    public function order_place(Request $request){
        $payment_method=$request->payment_method;
        $pdata=array();
        $pdata['payment_method']=$payment_method;
        $pdata['payment_status']='pending';
        $payment_id=DB::table('payments')->insertGetId($pdata);

        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']= Cart::total();
        $odata['order_status']='pending';
        $order_id=DB::table('orders')->insertGetId($odata);
        $contents=Cart::content();

        $oddata=array();
        foreach ($contents as $content){
            $oddata['order_id']=$order_id;
            $oddata['product_id']=$content->id;
            $oddata['product_name']=$content->name;
            $oddata['product_price']=$content->price;
            $oddata['product_sales_quantity']=$content->qty;
            DB::table('order_details')->insert($oddata);
        }
        if ($payment_method == 'handcash'){
            Cart::destroy();
            return view('pages.handcash');
        }
        elseif ($payment_method == 'paypal'){
            Cart::destroy();
            return view('pages.paypal');
        }
        elseif ($payment_method == 'stripecard'){
           // Cart::destroy();
            return view('pages.stripecard');
        }
        else{
            return redirect(url('/payment'));
        }
    }
//    private function handcash(){}
//    private function paypal(){}
//    private function stripecard(){}
    public function pay(Request $request)
    {
        //dd(request()->all());
        Stripe::setApiKey('sk_test_gPTtjIfS8YfstgTyqJzKFPCi00aSz0GwgC');
        //$token = $_POST['stripeToken'];
        $charge =Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'E Shopper Selling Books',
            'source' => $request->stripeToken,
        ]);
        
        Cart::destroy();
        return redirect('/');
    }

    public function logout_customer(){
        session()->flush();
        return Redirect::to('/');
    }
    private function CustomerAuthCheck(){
        $customer_id=Session::get('customer_id');
        if ($customer_id){
            return;
        }
        else{
            return Redirect::to('/login-checkout')->send();
        }
    }
}
