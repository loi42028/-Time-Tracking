<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Administrator',
                'scopes' => 'do_anything',
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'Device',
                'scopes' => 'create_device,checkin,checkout,view,update',
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'name' => 'Manege',
                'scopes' => 'group_management,checkin,checkout,view,update',
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'name' => 'Client',
                'scopes' => 'checkin,checkout,view,update',
                'created_at' => date('Y-m-d H:i:s'),                
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
