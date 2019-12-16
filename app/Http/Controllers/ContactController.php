<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ContactController extends Controller
{
    public function all_contact(){
        $this->AdminAuthCheck();
        $all_contact=DB::table('contacts')->get();
        return view('admin.all_contact',compact('all_contact'));
    }
    public function delete_contact($contact_id){
        DB::table('contacts')->where('id',$contact_id)->delete();
        Session::put('message','contact deleted successfully !!');
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
