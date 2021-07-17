<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user seeding
        DB::table('users')->insert([
            [
                'id' => 1,
                'rolesId' => 1,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'action' => 1,     
                'email_verified_at' => date('Y-m-d H:i:s'),           
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
                
            ],
            [
                'id' => 2,
                'rolesId' => 4,
                'email' => 'lehoangloi73@gmail.com',
                'password' => Hash::make('admin'),
                'action' => 1,     
                'email_verified_at' => date('Y-m-d H:i:s'),           
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
                
            ],
            [
                'id' => 3,
                'rolesId' => 2,
                'email' => 'nguyenquoccuong1999@gmail.com',
                'password' => Hash::make('admin'),
                'action' => 1,     
                'email_verified_at' => date('Y-m-d H:i:s'),           
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
                
            ],
            [
                'id' => 4,
                'rolesId' => 3,
                'email' => 'nvquan.itdn@gmail.com',
                'password' => Hash::make('admin'),
                'action' => 1,     
                'email_verified_at' => date('Y-m-d H:i:s'),           
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
                
            ],
            [
                'id' => 5,
                'rolesId' => 3,
                'email' => 'lhquy99.uda@gmail.com',
                'password' => Hash::make('admin'),
                'action' => 1,     
                'email_verified_at' => date('Y-m-d H:i:s'),           
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
                
            ],
        ]);
    }
}
