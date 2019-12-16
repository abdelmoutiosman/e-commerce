<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            "phone_number"=>"+925544122155",
            "gmail"=>"admin@gmail.com",
            "facebook_link"=>"E-SHOPPER",
            "twitter_link"=>"E-SHOPPER",
            "linkend_in_link"=>"E-SHOPPER",
            "google_link"=>"E-SHOPPER",
            "youtube_link"=>"E-SHOPPER",
            "web_name"=>"E-SHOPPER",
            "about_app"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor",
            "description"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor",
        ]);
    }
}
