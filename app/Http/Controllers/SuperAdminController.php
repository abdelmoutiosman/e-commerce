<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SuperAdminController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }
    public function edit_profile($admin_id){
        $this->AdminAuthCheck();
        $admin=DB::table('admins')->where('id',$admin_id)->first();
        return view('admin.profile',compact('admin'));
    }
    public function update_profile(Request $request,$admin_id){
        DB::table('admins')->where('id',$admin_id)
            ->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);
        Session::put('message','profile updated successfully !!');
        return redirect()->back();
    }
    public function edit_password($admin_id)
    {
        $this->AdminAuthCheck();
        $admin=DB::table('admins')->where('id',$admin_id)->first();
        return view('admin.changepassword',compact('admin'));
    }
    public function update_password(Request $request,$admin_id)
    {
        DB::table('admins')->where('id',$admin_id)
            ->update([
                'password'=>md5($request->password)
            ]);
        Session::put('message','password updated successfully !!');
        return redirect()->back();
    }

        public function logout(){
//        Session::put('name',null);
//        Session::put('id',null);
        session()->flush();
        return Redirect::to('/admin');
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
