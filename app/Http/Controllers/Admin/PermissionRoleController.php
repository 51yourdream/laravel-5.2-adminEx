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
class PermissionRoleController extends Controller
{
    public function anyIndex(){
        $id = Input::get('id');

//        $goodsShow = Goods::where('cate_id','=',$cate_id)
//            ->where(function($query){
//                $query->where('status','<','61')
//                    ->orWhere(function($query){
//                        $query->where('status', '91');
//                    });
//            })->first();
//        where cate_id = $cate_id AND (status < 61 OR status = 91);

//        $goodsShow = Goods::where([product_id'=>$id,'name'=>$name])->first();
        $permissions = PermissionRole::where(['role_id'=>$id])->get();
        return view('admin.permissionRole.index')->withPermissions($permissions);
    }
}