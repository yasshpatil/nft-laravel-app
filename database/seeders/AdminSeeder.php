<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_dummy_login=[];

        
        $admin_dummy_login['name'] = 'Admin';
        $admin_dummy_login['email'] = 'admin@redsignal.biz';
        $admin_dummy_login['password'] = Hash::make(12345);
       
        
        DB::table('admins')->insert($admin_dummy_login);
    }
}
