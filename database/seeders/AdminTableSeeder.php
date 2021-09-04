<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        Admin::create([
            'name'=>'admin',
            'email'=>'admin@yahoo.com',
            'password'=>Hash::make('11111111'),
         ]);
    }
}
