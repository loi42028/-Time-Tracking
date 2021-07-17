<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userProfile(Request $request){
        $userId = $request->user()->id;
        // $dataUser = User::where('users.id',$userId)->firstOrFail();
        $dataUser = User::Leftjoin('profile','profile.userId','=','users.id')                            
                            ->where('users.id',$userId)
                            ->select('*','users.id as id')
                            ->firstOrFail();
        return response()->json([
            $dataUser
        ]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveProfile(Request $request)
    {
        $userId = $request->user()->id;
        $dataprofile = array(
            'userId'=>$userId,
            'name' =>$request->name,
            'image'=>$request->image,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'identifynumber'=>$request->identifynumber,
            'intro'=>$request->intro,
        );
        $email= $request->email;
        if($email){
            DB::table('users')->where('id',$userId)->update(['email'=>$email]);
        }
        $checkprofile = DB::table('profile')->where('userId',$userId)->first();
        if($checkprofile){
            DB::table('profile')->where('userId',$userId)->update($dataprofile);
            
            return response()->json([
                    'message'=>'Successfully update Profile !'
                ],201);
        }else{
            DB::table('profile')->insert($dataprofile);
            return response()->json([
                'message'=>'Successfully created Profile !'
            ],201);
        }

    }


    

  
}
