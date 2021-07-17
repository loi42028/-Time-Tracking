<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function viewLoginAdmin(){
        return view('LoginAdmin.loginAdmin');
    }
    public function checkLoginAdmin(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return Redirect::to('admin/');
        }else{
            $request->session()->put('message','Mat Khau hoac Tai Khoan sai');
            return Redirect::to('/admin-login');
        }
    }
    public function logoutAdmin(){
        Auth::logout();
        return Redirect::to('/admin-login');
    }
}
