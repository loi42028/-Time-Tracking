<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Models\Roles;
use App\Models\TimeLogin;
use Illuminate\Support\Facades\Mail;

class Logincontroller extends Controller
{
    /**
     *create user
     * 
     * @param [String] email
     * @param [String] password
     * @param [TinYINT] action
     * @param [String] message
     * 
     */

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:users',
        ]);
        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'action' =>$request->action
        ]);
        $user->save();
        return response()->json([
            'message'=>'Successfully created user !'
        ],201);
    }

    public function login(Request $request)
    { 
        $credentials = request(['email', 'password']);
 
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'fails',
                'message' => 'Unauthorized'
            ], 401);
        }
        
        $userId = $request->user()->id;
        $lasttime = TimeLogin::where('userId', $userId)->first();
        $mytime = Carbon::now()->toDateTimeString();
        $newlasttime = new TimeLogin([
            'userId'=>$userId,
            'last_time_login'=> $mytime,
        ]);
        if($lasttime==null){            
            $newlasttime->save();
        }else{
            if(Carbon::parse($lasttime->last_time_login)->addHours(8)->isFuture()){
                return response()->json([
                    'status' => 'fails',
                    'message' => 'You can login after '.Carbon::parse($lasttime->last_time_login)->addHours(8)->format('h:i:s d-m-Y'),
                ], 401);                    
            }else{                
                TimeLogin::where('userId', $userId)->delete();
                $newlasttime->save(); 
            }
        }

        $roleId = $request->user()->rolesId;
        $Roles = Roles::where('id',$roleId)->first();
        $scopesRole = explode(',',$Roles->scopes);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token',$scopesRole);
        $token = $tokenResult->token;
        
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(20);
        }else{
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        $leader = Group::where('leader',$request->user()->id)->select('name')->first();
        if($leader){ $leader = true; }else{ $leader = false; }

        return response()->json([
            'status' => 'success',
            'leader' => $leader,
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,            
            'scopes' =>$token->scopes,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user
     * @return [string] message
     */
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message'=>'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     * @return [json] user object
     */
    public function user(Request $request){
        return response()->json($request->user());
    }

    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $to_name ='Time Tracking';
        $to_mail= $request->email;        
        $code = strtoupper(Str::random(6));
        $data = array('name' =>$to_mail,'code'=>$code);

        $password_sesets = new PasswordReset([
            'email' => $user->email,
            'code' => $code            
        ]);
        $checkcodeexist = PasswordReset::where('email',$user->email)->first();
        if($checkcodeexist == null){
            $password_sesets->save();
        }else{
            PasswordReset::where('email',$user->email)->delete();
            $password_sesets->save();
        }     
        Mail::send('SendMail.sendMail',$data,function($message) use($to_name,$to_mail){
            $message->from($to_mail,$to_name);
            $message->to($to_mail)->subject('Mã khôi phục tài khoản Time Tracking');            
        } );        
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }



    public function reset(Request $request, $code)
    {
        $passwordReset = PasswordReset::where('code', $code)->firstOrFail();
        if (Carbon::parse($passwordReset->created_at)->addMinutes(5)->isPast()) {
            $passwordReset->delete();

            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail(); 
        $updatePass = Hash::make($request->password); 
       
        $updatePasswordUser = $user->update(['password'=>$updatePass]);
        $passwordReset->delete();

        return response()->json([
            'success' => $updatePasswordUser,
        ]);
    }  
    public function dltTimeLogin(Request $request){
        $data = TimeLogin::Where('userId','>','1')->delete();
        if($data){
            return response()->json([
                'status' => 'True',
            ],);
        }else{
            return response()->json([
                'status' => 'False',
            ],);
        }        
    } 


}
