<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Web\DashBoardController;
use App\Http\Controllers\Web\GroupsController;
use App\Http\Controllers\Web\LoginController as WebLoginController;
use App\Http\Controllers\Web\RolesController;
use App\Http\Controllers\Web\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/',[WebLoginController::class,'viewLoginAdmin']);
    Route::get('/admin-login',[WebLoginController::class,'viewLoginAdmin'])->name('login');
    Route::post('/admin-login',[WebLoginController::class,'checkLoginAdmin']);        
    
    Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
        //dashboard
        Route::get('/',[UsersController::class,'listUser']);  
        Route::get('/logout-admin',[WebLoginController::class,'logoutAdmin']);      
        //User
        Route::group(['prefix'=>'users'],function(){
            Route::get('/',[UsersController::class,'listUser']);
            Route::get('/add-user',[UsersController::class,'addUser']);
            Route::post('/save-user',[UsersController::class,'saveUser']);
            Route::get('/edit-user/{iduser}',[UsersController::class,'editUser']);
            Route::post('/edit-user/{iduser}',[UsersController::class,'updateUser']);
            Route::get('/delete-user/{iduser}',[UsersController::class,'deleteUser']);
        });
        Route::group(['prefix'=>'groups'],function(){
            Route::get('/',[GroupsController::class,'listGroup']);
            Route::post('/save-group',[GroupsController::class,'saveGroup']);
            Route::get('/delete-group/{idgroup}',[GroupsController::class,'deleteGroup']);
            Route::get('/edit-group/{idgroup}',[GroupsController::class,'editGroup']);
            Route::post('/save-edit-group/{idgroup}',[GroupsController::class,'saveEditGroup']);


            Route::get('/list-user-group/{idgroup}',[GroupsController::class,'listUsersGroup']);
            Route::get('/dlt-user-group/{iduser}/{idgroup}',[GroupsController::class,'dltUserGroup']);
            Route::post('/save-new-member/{idgroup}',[GroupsController::class,'saveNewMember']);
            
        });
        Route::group(['prefix'=>'roles'],function(){
            Route::get('/',[RolesController::class,'ListRoles']);
        });

    
    });