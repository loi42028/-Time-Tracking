<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function ListRoles(){
        $dataroles = Roles::all();
        return view("Admin.Roles.ListRoles")->with('dataRoles',$dataroles);
    }
}
