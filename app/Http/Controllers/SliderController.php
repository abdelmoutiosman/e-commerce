<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SliderController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_slider');
    }
    public function all_slider(){
        $this->AdminAuthCheck();
        $all_sliders=DB::table('sliders')->get();
//        dd($all_sliders);
        return view('admin.all_slider',compact('all_sliders'));
    }
    public function save_slider(Request $request){
        $data=array();
        $data['publication_status']=$request->publication_status;
        $image=$request->file('slider_image');
        if ($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name. '.' .$ext;
            $upload_path='slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success){
                $data['slider_image']=$image_url;
                DB::table('sliders')->insert($data);
                Session::put('message','slider added successfully !!');
                return redirect()->back();
            }
        }
        $data['slider_image']='';
        DB::table('sliders')->insert($data);
        Session::put('message','slider added successfully !!');
        return redirect()->back();
    }
    public function delete_slider($slider_id){
        DB::table('sliders')->where('slider_id',$slider_id)->delete();
        Session::put('message','slider deleted successfully !!');
        return redirect()->back();
    }
    public function unactive($slider_id){
        DB::table('sliders')->where('slider_id',$slider_id)->update(['publication_status' => 0]);
        Session::put('message','slider unactived successfully !!');
        return redirect()->back();

    }
    public function active($slider_id){
        DB::table('sliders')->where('slider_id',$slider_id)->update(['publication_status' => 1]);
        Session::put('message','slider actived successfully !!');
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
