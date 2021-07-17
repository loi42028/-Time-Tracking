<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function listUser(){
        $data = DB::table('users')
        ->leftJoin('profile','users.id','=','userId')
        ->leftJoin('roles','roles.id','=','users.rolesId')
        ->select('profile.name as profileName','users.id as userId','users.email','roles.name as rolesName')
        ->simplePaginate(10);
        $group = DB::table('groups')->get();
        $usergroup = DB::table('user_group')->get();
            return view('Admin.Users.ListUsers')
                    ->with('dataUsers',$data)
                    ->with('group',$group)
                    ->with('usergroup',$usergroup);       
    }
    
    
    public function addUser(){
        $dataGroup = DB::table('groups')->orderByDesc('id')->get();
        $dataRoles = DB::table('roles')->orderByDesc('id')->get();
        return view('Admin.Users.AddUser')
                ->with('datagroup',$dataGroup)
                ->with('dataroles',$dataRoles);
               
    }

    public function saveUser(Request $request){

        $this->validation($request);

        $user = new User([
            'rolesId'=>$request->rolesId,
            'email' => $request->email,
            'password' => Hash::make('abc123'),
            'action' =>$request->action
        ]);
        
        $user->save();

        $userId = $user->id;
        $profile = new Profile([
            'userId' =>$userId,
            'name' =>$request->name,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'phone' =>$request->phone,
            'address'=>$request->address,
            'identifynumber' =>$request->identifynumber,
            'intro'=>$request->intro,
            'image'=> '',
        ]);       
        $profile->save(); 
        $usergroup = new UserGroup([
            'groupId' =>$request->groupId,
            'userId' =>$userId,
        ]);
        $usergroup->save();
        $profile->save();
        return Redirect::to('/admin/users');           
    }
    public function editUser($iduser){
        $dataUser = DB::table('users')
                        ->leftJoin('profile','users.id','=','profile.userId')                       
                        ->select('*','profile.id as profileId','users.id as id')
                        ->where('users.id',$iduser)
                        ->get();
        $dataGroup = DB::table('groups')
                        ->leftJoin('user_group','groups.id','=','user_group.groupId')
                        ->where('user_group.userId',$iduser)
                        ->orderByDesc('groups.id')
                        ->get();
        $dataRoles = DB::table('roles')                        
                        ->orderByDesc('id')
                        ->get();
               
        // print_r($dataGroup);
        return view('Admin.Users.UserProfile')
                ->with('datagroup',$dataGroup)
                ->with('dataroles',$dataRoles)
                ->with('dataUser',$dataUser);
    }
    public function updateUser(Request $request, $iduser){
        $this->validation($request);
        $dataUser = array(
            'email' => $request->email,
            'rolesId' =>$request->rolesId,
            'action' =>$request->action
        );
        // print_r($dataUser);
        DB::table('users')->where('id',$iduser)->update($dataUser);
        $checkprofile = DB::table('profile')->where('userId',$iduser)->first();
        $dataProfile = array(
            'name' =>$request->name,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'phone' =>$request->phone,
            'identifynumber' => $request->identifynumber,
            'address'=>$request->address,
            'intro'=>$request->intro,
            'image'=>'',

        );
        if($checkprofile != null){
            DB::table('profile')->where('userId',$iduser)->update($dataProfile);
        }else{
            $dataProfile['userId']= $iduser;
            DB::table('profile')->insert($dataProfile);
        }

        $UG = DB::table('user_group')->where('userId',$iduser)->first();
        if($UG != null){
            DB::table('user_group')->where('userId',$iduser)->update(['groupId'=>$request->groupId]);
        }else{
            $dataUG = array(
                'userId'=>$iduser,
                'groupId'=>$request->groupId
            );            
            DB::table('user_group')->insert($dataUG);
        }
        
        

       
        return Redirect::to('/admin/users');
   
    }
    public function validation(Request $request){
        return $this->validate($request,[
            'name' =>'required',
            'email'=>'required|email',
            'dob'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'identifynumber'=>'required'            
        ]);
    }

    public function deleteUser($idUser){
        DB::table('profile')->where('userId',$idUser)->delete();
        DB::table('users')->where('id',$idUser)->delete();
        DB::table('user_group')->where('userId',$idUser)->delete();
        return Redirect::to('/admin/users');
    }



}
