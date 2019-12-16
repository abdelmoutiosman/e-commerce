<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SettingController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        $model = DB::table('settings')->find(1);
        return view('admin.settings', compact('model'));
    }
    public function update(Request $request, $id)
    {
        DB::table('settings')->where('id',$id)->update([
            "phone_number"=>$request->phone_number,
            "gmail"=>$request->gmail,
            "facebook_link"=>$request->facebook_link,
            "twitter_link"=>$request->twitter_link,
            "linkend_in_link"=>$request->linkend_in_link,
            "google_link"=>$request->google_link,
            "web_name"=>$request->web_name,
            "about_app"=>$request->about_app,
            "description"=>$request->description
            ]);
        Session::put('message','setting updated successfully !!');
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
