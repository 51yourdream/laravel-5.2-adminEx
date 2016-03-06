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
    public function anyIndex()
    {
        $data['pageTitle'] = '后台首页测试';
        return view('admin.index',$data);
    }

}