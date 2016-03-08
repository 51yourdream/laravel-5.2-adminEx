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
                                <th class="">注册时间</th>
                                <th class="">修改时间</th>
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
                                <td class="">{{$user->created_at}}</td>
                                <td class="">{{$user->updated_at}}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-info margin-top-5">查看详情</a>
                                    <a href="" class="btn btn-sm btn-success margin-top-5">修改权限</a>
                                    <a href="" class="btn btn-sm btn-warning margin-top-5">禁用会员</a>
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