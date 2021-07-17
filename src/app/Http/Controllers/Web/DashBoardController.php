<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function viewDashBoard(){
        return view('Admin.DashBoard.DashBoard');
    }
    
}
