<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }
    public function dashboard(Request $request)
    {
        $admin_email=$request->email;
        $admin_password=md5($request->password);
        $result=DB::table('admins')
                    ->where('email',$admin_email)
                    ->where('password',$admin_password)
                    ->first();
        if($result){
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return Redirect::to('/dashboard');
        }
        else{
            Session::put('message','email or password invalid');
            return Redirect::to('/admin');
        }
    }
    public function forget_password(){
        return view('admin.forget_password');
    }
    public function update_password(Request $request){
        $result=DB::table('admins')->where('email',$request->email)->first();
        if ($result){
            $password=md5($request->password);
            $value=DB::table('admins')->where('password',$password)->first();
            if($value) {
                return Redirect::to('/admin');
            }else{
                DB::table('admins')->update([
                    'password'=>$password
                ]);
                return Redirect::to('/admin');
            }
        }
        else{
            Session::flash('message','email not founded !!');
            return Redirect::to('/forget-password');
        }
    }
}
