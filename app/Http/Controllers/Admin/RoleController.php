<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.role.index')->withRoles(Role::paginate(5));
    }
    //get展示单条数据
    public function show($id)
    {
        return view('admin.role.show')->withRole(Role::find($id));
    }
    //get添加表单
    public function create()
    {
        return view('admin.role.create');
    }

    //post 添加存储数据
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles|max:225',
            'label'=>'required',
        ]);
        $role = new Role();
        $role->name = Input::get('name');
        $role->label = Input::get('label');
        $role->description = Input::get('description');
        $request->flash();
        if($role->save()){
            return Redirect::to('admin/roles');
        }else{
            return Redirect::back()->withInput(Input::all())->withErrors('保存失败!');
        }
    }

    //get 修改表单展示
    public function edit($id)
    {
        return view('admin.role.edit')->withRole(Role::find($id));
    }

    //PUT/PATCH 修改保存
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles,name,'.$id.'|max:225',
            'label'=>'required'
        ]);
        $role = new Role();
        $role->name = Input::get('name');
        $role->label = Input::get('label');
        $role->description = Input::get('description');
        if($role->where('id',$id)->update(Input::except('_method','_token'))){
            return Redirect::to('admin/roles');
        }else{
            return Redirect::back()->withInput(Input::all())->withErrors('保存失败!');
        }
    }

    //DELETE 删除
    public function destroy($id)
    {
        Role::find($id)->delete();
        return Redirect::to('admin/roles');
    }
}
