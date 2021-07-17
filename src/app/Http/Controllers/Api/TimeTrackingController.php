<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Time_Tracking;
use App\Models\TypeTracking;
use App\Models\User;
use App\Models\UserGroup;
use Facade\FlareClient\Time\Time;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TimeTrackingController extends Controller
{
     /**
     *create time tracking
     * 
     * @param [BigInt] userId
     * @param [BigInt] type
     * @param [Datetime] time
     * @param [Datetime] refevence
     * 
     */
    public function saveTimeTranking(Request $request){
        $userid = $request->user()->id;

        //lấy ngày hiện tại
        $mytime = Carbon::now()->format('Y-m-d');

        // lấy publickey
        $publickey =  DB::table('device')
                    ->where('namedevice',$request->namedevice)
                    ->select('publickey')
                    ->first();
        //hàm decode
        $time = JWT::decode($request->jwt,  $publickey->publickey, array('RS256'));

        //get type checkin
        $typecheckin = TypeTracking::where('nametype','checkin')->select('id')->first();
        //get type checkout
        $typecheckout = TypeTracking::where('nametype','checkout')->select('id')->first();


        //lấy lần cuối time checkin
        $lastCheckin = Time_Tracking::whereDate('time','=',$mytime)->where('userId',$userid)->where('type',$typecheckin->id)->selectRaw('max(time) as lastcheckin')->first();

         $timeTracking = new Time_Tracking([
            'userId' =>$userid,
            'time' =>$time->time,
             // 'time' =>$decoded->time,
        ]);        

        // xác định xem đã checkin hay chưa và đã checkin hay check out
        $endtime = Time_Tracking::whereDate('time','=',$mytime)->where('userId',$userid)->selectRaw('max(time) as endtime')->first();
        $kq = Time_Tracking::whereDate('time','=',$mytime)->where('userId',$userid)->where('time',$endtime->endtime)->select('type')->first();
        
        //nếu là ngày mới lưu checkin , nếu đã checkin ->checkout, và ngược lại
        if($kq){
            switch ($kq->type) {
                case  $typecheckin->id:
                    $timeTracking['type']= $typecheckout->id;
                    $timeTracking['refevence'] = $lastCheckin->lastcheckin;
                    break;
                case $typecheckout->id:                    
                    $timeTracking['type']= $typecheckin->id;
                    $timeTracking['refevence'] =null;
                    break;    

                default:
                    return response()->json([                
                        'message' => 'Contact management for handling ! phone : 0822109173',
                    ]);
            }
        }else{
            $timeTracking['type']= $typecheckin->id;
            $timeTracking['refevence'] =null;
        }        

        // nếu code quá hạng thì sẽ k lưu, 
        // nếu là chưa chechin hoặc trước đó là checkout thì thư checkin, 
        // nếu trước đó là checkin thì lưu check out
        if (Carbon::parse($time->time)->addSeconds(10)->isPast()) {     
            return response()->json([                
                'message' => 'QR code is not correct !',
            ]);
        }else{
            $timeTracking->save();
            if($timeTracking->type == $typecheckin->id){
                return response()->json([
                    'message' => 'you have checked in successfully',
                ]);
            }else{
                return response()->json([
                    'message' => 'you have checked out successfully',
                ]);
            }
         }   
    }



    public function getKeyByName(Request $request){
        $publickey =  DB::table('device')
                    ->where('namedevice',$request->namedevice)
                    ->select('publickey')
                    ->first();
        return response()->json([
            $publickey
        ]); 
}



public function saveTimeTrankingQR(Request $request){
    $userid = $request->user()->id;
    $time = $request->time;
    //lấy ngày hiện tại
    $mytime = Carbon::now()->format('Y-m-d');

    //get type checkin
    $typecheckin = TypeTracking::where('nametype','checkin')->select('id')->first();
    //get type checkout
    $typecheckout = TypeTracking::where('nametype','checkout')->select('id')->first();


    //lấy lần cuối time checkin
    $lastCheckin = Time_Tracking::whereDate('time','=',$mytime)->where('userId',$userid)->where('type',$typecheckin->id)->selectRaw('max(time) as lastcheckin')->first();

     $timeTracking = new Time_Tracking([
        'userId' =>$userid,
        // 'time' =>$time->time,
         'time' =>$time,
    ]);        

    // xác định xem đã checkin hay chưa và đã checkin hay check out
    $endtime = Time_Tracking::whereDate('time','=',$mytime)->where('userId',$userid)->selectRaw('max(time) as endtime')->first();
    $kq = Time_Tracking::whereDate('time','=',$mytime)->where('userId',$userid)->where('time',$endtime->endtime)->select('type')->first();
    
    //nếu là ngày mới lưu checkin , nếu đã checkin ->checkout, và ngược lại
    if($kq){
        switch ($kq->type) {
            case  $typecheckin->id:
                $timeTracking['type']= $typecheckout->id;
                $timeTracking['refevence'] = $lastCheckin->lastcheckin;
                break;
            case $typecheckout->id:                    
                $timeTracking['type']= $typecheckin->id;
                $timeTracking['refevence'] =null;
                break;    

            default:
                return response()->json([                
                    'message' => 'Contact management for handling ! phone : 0822109173',
                ]);
        }
    }else{
        $timeTracking['type']= $typecheckin->id;
        $timeTracking['refevence'] =null;
    }
    

    // nếu code quá hạng thì sẽ k lưu, 
    // nếu là chưa chechin hoặc trước đó là checkout thì thư checkin, 
    // nếu trước đó là checkin thì lưu check out
    if (Carbon::parse($time)->addSeconds(10)->isPast()) {     
        return response()->json([                
            'message' => 'QR code is not correct !',
        ]);
    }else{
        $timeTracking->save();
        if($timeTracking->type == $typecheckin->id){
            return response()->json([
                'message' => 'you have checked in successfully',
            ]);
        }else{
            return response()->json([
                'message' => 'you have checked out successfully',
            ]);
        }
     }   
}

    public function showByDate(Request $request , $day){
        $userid = $request->user()->id;
        $timeTracking = Time_Tracking::whereDate('time','=',$day)->where('userId',$userid)->get();
        return response()->json([
            $day=>$timeTracking
        ],201);     
    }
    public function showByWeek(Request $request, $firstDay,$lastDay){
        $userid = $request->user()->id;
        $timeTracking = Time_Tracking::whereDate('time','>=',$firstDay)->whereDate('time','<=',$lastDay)->where('userId',$userid)->get();
        return response()->json([
            "(".$firstDay.")-(".$lastDay.")"=>$timeTracking
        ],201); 
    }
    public function showByMonth(Request $request, $month){
        $userid = $request->user()->id;
        $timeTracking = Time_Tracking::where('time','like',$month.'%')->where('userId',$userid)->get();
        return response()->json([
            $month =>$timeTracking
        ],201); 
    }

    public function checkinFirstOfDay(Request $request){
        $userid = $request->user()->id;
        $arrayDay = $request->arrayDay;
        $minTime = array();
        for($i = 0; $i < count($arrayDay); $i++){
            $timeTracking = Time_Tracking::whereDate('time','=',$arrayDay[$i])->where('userId',$userid)->selectRaw('min(time) as mintime')->first();
            $minTime[$arrayDay[$i]]=$timeTracking;
        }
        return response()->json([
            $minTime
        ],201); 
    }

    
    public function absentOfDay(Request $request){
        $userid = $request->user()->id;
        $arrayDay = $request->arrayDay;
        $minTime = array();
        for($i = 0; $i < count($arrayDay); $i++){
            $timeTracking = Time_Tracking::whereDate('time','=',$arrayDay[$i])->where('userId',$userid)->first();
            if($timeTracking == null){
                array_push($minTime,$arrayDay[$i]);
            }           
        }
        return response()->json([
            $minTime
        ],201); 
    }

    public function absentOfGroup(Request $request){
        $mytime = Carbon::now()->format('Y-m-d');
        $userid = $request->user()->id;
        $group = Group::where('leader','=',$userid)->first();
        if(!$group){
            return response()->json([
               'message' => 'non-leader account'
            ]);
        }
        $listuserid = UserGroup::where('groupId',$group->id)->select('userId')->get();
        $grouplate = array();
        for($i = 0; $i<count($listuserid);$i++){
            $gmail = User::where('id',$listuserid[$i]->userId)->select('email')->first();
            $mintimegroup = Time_Tracking::whereDate('time',$mytime)->where('userId',$listuserid[$i]->userId)->selectRaw('min(time) as min')->first();
            $grouplate[$gmail->email] = $mintimegroup->min;
        }
        return response()->json([
            $grouplate
        ]);
    }

}
