<?php

/**
 * Created by PhpStorm.
 * User: lipeng
 * Date: 16/3/6
 * Time: 下午8:58
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }
    //首页
    public function index()
    {
        $data['pageTitle'] = '后台首页测试';
        return view('admin.index',$data);
    }
    //创建
    public function create()
    {

    }

    public function store()
    {

    }

    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}