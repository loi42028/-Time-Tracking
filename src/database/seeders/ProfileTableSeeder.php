<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
            [
                'id' => 1,
                'userId' => 3,
                'name' => "Nguyễn Quốc Cường",          
                'image' => null,
                'dob' =>date('Y-m-d'),
                'gender' => 1,
                'phone'=>'0961401478',
                'identifynumber'=>'0961401478',
                'address'=>'Quang Ngai',
                'intro' => 'nhân viên Device',
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'userId' => 4,
                'name' => "Nguyễn Văn Quân",          
                'image' => null,
                'dob' =>date('Y-m-d'),
                'gender' => 1,
                'phone'=>'0961401478',
                'identifynumber'=>'0961401478',
                'address'=>"Quảng Trị",
                'intro' => "Manager",
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'userId' => 1,
                'name' => "Administrator",          
                'image' => null,
                'dob' =>date('Y-m-d'),
                'gender' => 1,
                'phone'=>'0961401478',
                'identifynumber'=>'0961401478',
                'address'=>"Quảng Trị",
                'intro' => "Administrator",
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'userId' => 2,
                'name' => "Lê Hoàng Lợi",          
                'image' => null,
                'dob' =>"1999/07/03",
                'gender' => 1,
                'phone'=>'0961401478',
                'identifynumber'=>'0961401478',
                'address'=>"Thừa Thiên Huế",
                'intro' => "Administrator",
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'userId' => 5,
                'name' => "Lê Huy Quý",          
                'image' => null,
                'dob' =>date('Y-m-d'),
                'gender' => 1,
                'phone'=>'0961401478',
                'identifynumber'=>'0961401478',
                'address'=>"Nghệ An",
                'intro' => "Client",
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
