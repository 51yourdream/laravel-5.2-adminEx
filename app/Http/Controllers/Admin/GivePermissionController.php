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
use App\Permission;
use App\Role;
use App\PermissionRole;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class GivePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function anyIndex(){
        $id = Input::get('id');
        $inPermissions = Permission::whereNotIn('id',PermissionRole::where('role_id','=',$id)->get(['permission_id'])->toArray())
            ->get();

        $NotInPermissions = Permission::whereIn('id',PermissionRole::where('role_id','=',$id)->get(['permission_id'])->toArray())
        ->get();
        return view('admin.permissionRole.index')->withInPermissions($inPermissions)->withNotInPermissions($NotInPermissions)->withId($id);
    }
    //给角色分配权限
    public function anyAssignPermission(){
        $role_id = Input::get('rid');
        $permission_id = Input::get('pid');
        $permission = Permission::find($permission_id); //查出权限
        $role = Role::find($role_id);  //查出角色
        $role->givePermissionTo($permission);
        return Redirect::back();
    }
    //删除权限
    public function anyDeletePermission(){
        $role_id = Input::get('rid');
        $permission_id = Input::get('pid');
        PermissionRole::where('permission_id','=',$permission_id)
            ->where('role_id','=',$role_id)
            ->delete();
        return Redirect::back();
    }
}