@extends('_layout.main')
{{--需要处理的变更：  $pageTitle $pageKeywords $pageDescription --}}
{{--可以重写的模块：@section('masterCss')@overwrite @section('masterJS')@overwrite--}}
@section('pageCss')
    <link rel="stylesheet" href="{{asset('static/css/table-responsive.css')}}">
    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop

@section('wrapper')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <a href="{{URL::to('admin/users/create')}}" class="btn btn-info">添加会员</a>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>选择</th>
                                <th>ID</th>
                                <th class="">用户名</th>
                                <th class="">邮箱</th>
                                {{--<th class="">超级管理员</th>--}}
                                <th class="">所属角色</th>
                                <th class="">创建时间</th>
                                <th class="">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)
                            <tr>
                                <td><input type="checkbox" name=""></td>
                                <td>{{$user->id}}</td>
                                <td class="">{{$user->name}}</td>
                                <td class="">{{$user->email}}</td>
                                {{--<td class=""><span class="btn btn-xs btn-danger">是</span></td>--}}
                                <td class=""><span class="btn btn-xs btn-info">{{\App\User::getRoleName($user->id)}}</span></td>
                                <td class="">{{$user->created_at}}</td>
                                <td>
                                    <div type="2" title="查看信息" shadeClose=0 shade="0.5" with="600px" height="400px" content="{{URL::to('admin/users').'/'.$user->id}}" class="btn btn-sm btn-info margin-top-5" role="layer">查看信息</div>
                                    <a href="{{URL::to('admin/users').'/'.$user->id.'/edit'}}" class="btn btn-sm btn-success margin-top-5">修改信息</a>
                                    <div type="2" title="查看权限" shadeClose=0 shade="0.5" with="600px" height="400px" content="{{URL::to('admin/giveRole/index?id=').$user->id}}" class="btn btn-sm btn-warning margin-top-5" role="layer">配置权限</div>
                                    <a href="" class="btn btn-sm btn-danger margin-top-5">禁用</a>
                                    <form action="{{ URL('admin/users/'.$user->id)}}" method="POST" style="display: inline;">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-sm btn-danger margin-top-5">删除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>

    <?php echo $users->render(); ?>
@stop



@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop