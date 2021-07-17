<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTrackingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_tracking')->insert([
            // 1 ngày
            [
                'id'=>1,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-14 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>2,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-14 11:30:11',
                'refevence'=>'2021-06-14 08:00:11',   
            ],
            [
                'id'=>3,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-14 13:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>4,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-14 15:00:11',
                'refevence'=>'2021-06-14 13:00:11',   
            ],
            [
                'id'=>5,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-14 16:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>6,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-14 17:00:11',
                'refevence'=>'2021-06-14 16:00:50',   
            ],


            // 1 ngày
            [
                'id'=>7,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-15 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>8,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-15 11:30:11',
                'refevence'=>'2021-06-15 08:00:11',   
            ],
            [
                'id'=>9,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-15 13:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>10,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-15 15:00:11',
                'refevence'=>'2021-06-15 13:00:11',   
            ],
            [
                'id'=>11,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-15 16:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>12,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-15 17:00:11',
                'refevence'=>'2021-06-15 16:00:50',   
            ],

            // 1 ngày
            [
                'id'=>13,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-16 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>14,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-16 11:30:11',
                'refevence'=>'2021-06-16 08:00:11',   
            ],
            [
                'id'=>15,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-16 13:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>16,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-16 15:00:11',
                'refevence'=>'2021-06-16 13:00:11',   
            ],
            [
                'id'=>17,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-16 16:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>18,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-16 17:00:11',
                'refevence'=>'2021-06-16 16:00:50',   
            ],

            // 1 ngày
            [
                'id'=>19,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-17 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>20,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-17 11:30:11',
                'refevence'=>'2021-06-17 08:00:11',   
            ],
            [
                'id'=>21,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-17 13:00:11',
                'refevence'=>null,   
            ],
            
            [
                'id'=>22,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-17 17:00:11',
                'refevence'=>'2021-06-17 13:00:50',   
            ],

            // 1 ngày
            [
                'id'=>23,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-18 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>24,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-18 11:30:11',
                'refevence'=>'2021-06-18 08:00:11',   
            ],
            [
                'id'=>25,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-18 13:00:11',
                'refevence'=>null,   
            ],
            
            [
                'id'=>26,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-18 20:00:11',
                'refevence'=>'2021-06-18 13:00:50',   
            ],

            // 1 ngày
            [
                'id'=>27,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-21 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>28,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-21 11:30:11',
                'refevence'=>'2021-06-21 08:00:11',   
            ],
            [
                'id'=>29,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-21 13:00:11',
                'refevence'=>null,   
            ],
            
            [
                'id'=>30,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-21 20:00:11',
                'refevence'=>'2021-06-21 13:00:50',   
            ],

            // 1 ngày
            [
                'id'=>31,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-22 09:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>32,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-22 11:30:11',
                'refevence'=>'2021-06-22 08:00:11',   
            ],
            [
                'id'=>33,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-22 13:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>34,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-22 15:00:11',
                'refevence'=>'2021-06-22 13:00:11',   
            ],
            [
                'id'=>35,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-22 16:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>36,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-22 17:00:11',
                'refevence'=>'2021-06-22 16:00:50',   
            ],

            // 1 ngày
            [
                'id'=>37,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-23 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>38,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-23 11:30:11',
                'refevence'=>'2021-06-23 08:00:11',   
            ],
            [
                'id'=>39,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-23 13:30:11',
                'refevence'=>null,   
            ],
            [
                'id'=>40,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-23 15:00:11',
                'refevence'=>'2021-06-23 13:00:11',   
            ],
            [
                'id'=>41,
                'userId'=>4,
                'type'=>1,
                'time'=>'2021-06-23 16:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>42,
                'userId'=>4,
                'type'=>2,
                'time'=>'2021-06-23 17:00:11',
                'refevence'=>'2021-06-23 16:00:50',   
            ],


            // 1 ngày
            //user quy
            [
                'id'=>43,
                'userId'=>5,
                'type'=>1,
                'time'=>'2021-06-21 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>44,
                'userId'=>5,
                'type'=>2,
                'time'=>'2021-06-21 11:30:11',
                'refevence'=>'2021-06-21 08:00:11',   
            ],
            [
                'id'=>45,
                'userId'=>5,
                'type'=>1,
                'time'=>'2021-06-21 13:00:11',
                'refevence'=>null,   
            ],
            
            [
                'id'=>46,
                'userId'=>5,
                'type'=>2,
                'time'=>'2021-06-21 20:00:11',
                'refevence'=>'2021-06-21 13:00:50',   
            ],

            // 1 ngày
            [
                'id'=>47,
                'userId'=>5,
                'type'=>1,
                'time'=>'2021-06-22 09:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>48,
                'userId'=>5,
                'type'=>2,
                'time'=>'2021-06-22 11:30:11',
                'refevence'=>'2021-06-22 08:00:11',   
            ],
            [
                'id'=>49,
                'userId'=>5,
                'type'=>1,
                'time'=>'2021-06-22 13:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>50,
                'userId'=>5,
                'type'=>2,
                'time'=>'2021-06-22 15:00:11',
                'refevence'=>'2021-06-22 13:00:11',   
            ],
            [
                'id'=>51,
                'userId'=>5,
                'type'=>1,
                'time'=>'2021-06-22 16:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>52,
                'userId'=>5,
                'type'=>2,
                'time'=>'2021-06-22 17:00:11',
                'refevence'=>'2021-06-22 16:00:50',   
            ],

            // 1 ngày
            [
                'id'=>53,
                'userId'=>5,
                'type'=>1,
                'time'=>'2021-06-23 08:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>54,
                'userId'=>5,
                'type'=>2,
                'time'=>'2021-06-23 11:30:11',
                'refevence'=>'2021-06-23 08:00:11',   
            ],
            [
                'id'=>55,
                'userId'=>5,
                'type'=>1,
                'time'=>'2021-06-23 13:30:11',
                'refevence'=>null,   
            ],
            [
                'id'=>56,
                'userId'=>5,
                'type'=>2,
                'time'=>'2021-06-23 15:00:11',
                'refevence'=>'2021-06-23 13:00:11',   
            ],
            [
                'id'=>57,
                'userId'=>5,
                'type'=>1,
                'time'=>'2021-06-23 16:00:11',
                'refevence'=>null,   
            ],
            [
                'id'=>58,
                'userId'=>5,
                'type'=>2,
                'time'=>'2021-06-23 17:00:11',
                'refevence'=>'2021-06-23 16:00:50',   
            ],


            
            
            
            
        ]);
    }
}
