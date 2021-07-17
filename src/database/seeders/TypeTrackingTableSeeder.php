<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTrackingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_tracking')->insert([
            [
                'id' => 1,
                'nametype' => 'checkin',                
            ],
            [
                'id' => 2,
                'name' => 'checkout',                
            ],
        ]);
    }
}
