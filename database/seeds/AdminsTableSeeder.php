<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            "name"=>"abdelmouti osman",
            "email"=>"admin@admin.com",
            "password"=>md5(123),
            "phone"=>"01098257970"
        ]);
    }
}
