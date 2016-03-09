<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.permission.index')->withPermissions(Permission::paginate(5));
    }
    //get展示单条数据
    public function show($id)
    {

    }
    //get添加表单
    public function create()
    {

    }

    //post 添加存储数据
    public function store()
    {

    }

    //get 修改表单展示
    public function edit($id)
    {

    }

    //PUT/PATCH 修改保存
    public function update()
    {

    }

    //DELETE 删除
    public function destroy($id)
    {

    }
}
