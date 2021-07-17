<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Group;
use App\Models\KeyQR;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\False_;

class QRcodeController extends Controller
{
    public function saveDevice(Request $request){
        $userid = $request->user()->id;
        $checkkey = Device::where('namedevice',$request->namedevice)->first();
        $keyqr = new Device([
            'publickey' =>$request->publickey,
            'namedevice'=>$request->namedevice,
            'creator' =>$userid
        ]);
        if($checkkey == null){
            $keyqr->save();
        }else{
            Device::where('namedevice',$request->namedevice)->delete();
            $keyqr->save();
        }        
        return response()->json([
            'message'=>'Successfully created Device !'
        ]);

    }
}
