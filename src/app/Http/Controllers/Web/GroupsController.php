<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GroupsController extends Controller
{
    public function listGroup(){
        $dataGroups = DB::table('groups')
                        ->leftJoin('users','groups.leader','=','users.id')
                        ->leftJoin('profile','users.id','=','profile.userId')
                        ->leftJoin('users as usercreator','groups.creator','=','usercreator.id')
                        ->select('groups.*','profile.name as username','users.id as userId','users.email as leader','usercreator.email as creatoremail')                        
                        ->simplePaginate(10);
        $countStaff = DB::table('groups')
                        ->leftJoin('user_group', 'groups.id', '=', 'user_group.groupId')
                        ->leftJoin('users', 'users.id', '=', 'user_group.groupId')
                        ->select('groups.id',DB::raw('count(users.id) as staff'))
                        ->groupBy('groups.id')
                        ->get();
        return view("Admin.Groups.ListGroups")->with('dataGroups',$dataGroups)->with('countStaff',$countStaff);
    }
    public function saveGroup(Request $request){
        $this->validation($request);
        $namegroup = Group::where('name',$request->namegroup)->first();
        if ($namegroup) {
            return back()->withErrors([
                'namegroup' => 'The group name already exists, please give it another name',
            ]);
        }
        $idleader = User::where('email',$request->leader)->first();
        if($idleader){            
            $group = new Group([
                'leader'=>$idleader->id,
                'creator'=>$request->user()->id,
                'name' =>$request->namegroup,            
                'desc'=>$request->intro,
            ]);
            $group->save();
            return Redirect::to('/admin/groups/')->with('message','Successfully Added Group');
        }
        return back()->withErrors([
            'leader' => 'The team leader email provided does not match our profile.',
        ]);
    }

    public function deleteGroup($idgroup){
        DB::table('user_group')->where('groupId',$idgroup)->delete();
        DB::table('groups')->where('id',$idgroup)->delete();
        return Redirect::to('/admin/groups/');
    }

    public function editGroup($idgroup){
        $dataGroup = DB::table('groups')
                    ->where('groups.id',$idgroup)
                    ->leftJoin('users','users.id','groups.leader')
                    ->select('users.email as email','groups.id as groupId','groups.name as groupname','groups.desc as desc')
                    ->first();
        // print_r($dataGroup);
        return view("Admin.Groups.EditGroup")->with('dataGroup',$dataGroup);
    }
    

    public function saveEditGroup($idgroup,Request $request){
        $namegroup = Group::where('name',$request->namegroup)->where('id','!=',$idgroup)->first();
        if ($namegroup) {
            return back()->withErrors([
                'namegroup' => 'The group name already exists, please give it another name',
            ]);
        }
        $idleader = User::where('email',$request->leader)->first();
        if($idleader){            
            $group = array(
                'leader'=>$idleader->id,
                'name' =>$request->namegroup,            
                'desc'=>$request->intro,
            );
            DB::table('groups')->where('id',$idgroup)->update($group);
            return Redirect::to('/admin/groups/')->with('message','Group Edit Successful.');
        }
        return back()->withErrors([
            'leader' => 'The team leader email provided does not match our profile.',
        ]);    
    }




    public function listUsersGroup($idgroup){
        $dataUsers = DB::table('users')
                    ->leftJoin('profile','users.id','=','profile.userId')
                    ->leftJoin('roles','roles.id','=','users.rolesId')
                    ->leftJoin('user_group','user_group.userId','=','users.id')
                    ->where('user_group.groupId','=',$idgroup)
                    ->select('profile.name as profileName','users.id as userId','users.email','roles.name as rolesName','user_group.groupId as groupId')
                    ->simplePaginate(10);
        $dataGroup = DB::table('groups')->where('id',$idgroup)->first(); 
        return view("Admin.Groups.ListUsersGroup")->with('dataUsers',$dataUsers)->with('dataGroup',$dataGroup);
    }

    public function dltUserGroup($iduser,$idgroup){
        DB::table('user_group')->where('userId',$iduser)->delete();
        return Redirect::to('/admin/groups/list-user-group/'.$idgroup);
    }
    public function saveNewMember($idgroup,Request $request){
        $idmenber = User::where('email',$request->member)->first();
        if($idmenber){  
            $checkExistence = UserGroup::where('userId',$idmenber->id)->where('userId',$idgroup)->first();
            if(!$checkExistence){
                $user_group = new UserGroup([
                    'groupId' =>$idgroup,
                    'userId'  =>$idmenber->id
                ]) ;      
                $user_group->save();
                return Redirect::to('/admin/groups/list-user-group/'.$idgroup)->with('message','Successfully Added Members');
            }else{
                return back()->withErrors([
                    'menber' => 'Members already in the group',
                ]);
            }            
        }
        return back()->withErrors([
            'menber' => 'The email provided by the member does not match our profile.',
        ]);
    }

    public function validation(Request $request){
        return $this->validate($request,[
            'namegroup' =>'required',
            'leader'=>'email|required',           
        ]);
    }
}
