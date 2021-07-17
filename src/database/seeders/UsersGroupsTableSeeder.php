<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_group')->insert([
            [
                'id'=>1,
                'groupId' =>1,
                'userId' => 1,   
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),     
            ],
            [
                'id'=>2,
                'groupId' =>1,
                'userId' => 2,   
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),     
            ],
            [
                'id'=>3,
                'groupId' =>1,
                'userId' => 3,   
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),     
            ],
            [
                'id'=>4,
                'groupId' =>1,
                'userId' => 4,   
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),     
            ],
            [
                'id'=>5,
                'groupId' =>2,
                'userId' => 1,   
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),     
            ],
            [
                'id'=>6,
                'groupId' =>2,
                'userId' => 4,   
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),     
            ],
            
        ]);
    }
}
