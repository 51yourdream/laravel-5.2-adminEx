<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.permission.index')->withPermissions(Permission::paginate(5));
    }
    //get展示单条数据
    public function show($id)
    {
        return view('admin.permission.show')->withPermission(Permission::find($id));
    }
    //get添加表单
    public function create()
    {
        return view('admin.permission.create');
    }

    //post 添加存储数据
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:permissions|max:225',
            'label'=>'required',
        ]);
        $permission = new Permission();
        $permission->name = Input::get('name');
        $permission->label = Input::get('label');
        $permission->description = Input::get('description');
        $request->flash();
        if($permission->save()){
            return Redirect::to('admin/permissions');
        }else{
            return Redirect::back()->withInput(Input::all())->withErrors('保存失败!');
        }
    }

    //get 修改表单展示
    public function edit($id)
    {
        return view('admin.permission.edit')->withPermission(Permission::find($id));
    }

    //PUT/PATCH 修改保存
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|unique:permissions,name,'.$id.'|max:225',
            'label'=>'required'
        ]);
        $permission = new Permission();
        $permission->name = Input::get('name');
        $permission->label = Input::get('label');
        $permission->description = Input::get('description');
        if($permission->where('id',$id)->update(Input::except('_method','_token'))){
            return Redirect::to('admin/permissions');
        }else{
            return Redirect::back()->withInput(Input::all())->withErrors('保存失败!');
        }
    }

    //DELETE 删除
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return Redirect::to('admin/permissions');
    }
}
