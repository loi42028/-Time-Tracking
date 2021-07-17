<?php

use App\Http\Controllers\Api\DashBoardController;
use App\Http\Controllers\Api\Logincontroller;
use App\Http\Controllers\Api\QRcodeController;
use App\Http\Controllers\Api\ResetPassController;
use App\Http\Controllers\Api\TimeTrackingController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['prefix'=>'auth'],function(){
    Route::post('login',[Logincontroller::class,'login']);
    // Route::post('signup',[Logincontroller::class,'signup']);
    Route::post('reset-password',[Logincontroller::class,'sendMail']);
    Route::post('reset-password/{code}',[Logincontroller::class,'reset']);

    
    // Route::post('getkeybyname',[TimeTrackingController::class,'getKeyByName']);

    
    Route::group(['middleware'=>'auth:api'],function(){
        Route::post('save-device',[QRcodeController::class,'saveDevice'])
        ->middleware('scope:create_device,do_anything');
        //api k su dung. xem user dang dang nhap
        Route::post('user',[Logincontroller::class,'user'])
        ->middleware('scope:do_anything');

        Route::post('logout',[Logincontroller::class,'logout']);

        Route::post('save-profile',[UserController::class,'saveProfile'])
        ->middleware('scope:update,do_anything');

        //time- tracking
        Route::post('save-time-tracking',[TimeTrackingController::class,'saveTimeTranking'])
        ->middleware('scope:checkin,checkout,do_anything');

        Route::post('get-key-byname',[TimeTrackingController::class,'getKeyByName'])
        ->middleware('scope:checkin,checkout,do_anything');

        Route::post('save-time-tracking-qr',[TimeTrackingController::class,'saveTimeTrankingQR'])
        ->middleware('scope:checkin,checkout,do_anything');

        Route::post('time-tracking-by-day/{day}',[TimeTrackingController::class,'showByDate'])
        ->middleware('scope:view,do_anything');

        Route::post('time-tracking-by-week/{firstDay}/{lastDay}',[TimeTrackingController::class,'showByWeek'])
        ->middleware('scope:view,do_anything');

        Route::post('time-tracking-by-month/{month}',[TimeTrackingController::class,'showByMonth'])
        ->middleware('scope:view,do_anything');
            //chechin first of day
        Route::post('time-tracking-first-day',[TimeTrackingController::class,'checkinFirstOfDay'])
        ->middleware('scope:view,do_anything');

        Route::post('time-tracking-absent',[TimeTrackingController::class,'absentOfDay'])
        ->middleware('scope:view,do_anything');



        //profile
        Route::post('profile-staff',[UserController::class,'userProfile'])
        ->middleware('scope:view,do_anything');
        //decode QR
        Route::post('decode',[QRcodeController::class,'decode']);
        
        Route::post('absentOfGroup',[TimeTrackingController::class,'absentOfGroup'])
        ->middleware('scope:group_management,do_anything');
        
        Route::delete('dltTimeLogin',[Logincontroller::class,'dltTimeLogin']);
        
    });

});

