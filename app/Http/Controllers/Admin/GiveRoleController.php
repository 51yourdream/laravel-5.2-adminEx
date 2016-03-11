<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/10
 * Time: 17:28
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class GiveRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function anyIndex(){
        $id = Input::get('id');
        $inRoles = Role::whereNotIn('id',RoleUser::where('user_id','=',$id)->get(['role_id'])->toArray())
            ->get();
        $notInRoles = Role::whereIn('id',RoleUser::where('user_id','=',$id)->get(['role_id'])->toArray())
        ->get(); //
        return view('admin.roleUser.index')->withInRoles($inRoles)->withNotInRoles($notInRoles)->withId($id);
    }
    //给用户分配角色
    public function anyAssignRole(){
        $user_id = Input::get('uid');
        $role_id = Input::get('rid');
        $role = Role::find($role_id); //查出角色
        $user = User::find($user_id);  //查出用户
        //如果该用户没有任何角色 则分配新的角色 否则修改现有的角色为新的角色
        if(!(RoleUser::where('user_id','=',$user_id)->get()->toArray())){
            $user->assignRole($role->name);
        }else{
            $roleUser = RoleUser::where('user_id','=',$user_id);
            if($role->id){
                $roleUser->update(['role_id'=>$role_id]);
            }
        }
        return Redirect::back();
    }
    //删除角色
    public function anyDeleteRole(){
        $user_id = Input::get('uid');
        $role_id = Input::get('rid');
        RoleUser::where('user_id','=',$user_id)
            ->where('role_id','=',$role_id)
            ->delete();
        return Redirect::back();
    }
}