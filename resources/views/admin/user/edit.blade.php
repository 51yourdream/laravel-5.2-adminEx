@extends('_layout.main')
{{--需要处理的变更：  $pageTitle $pageKeywords $pageDescription --}}
{{--可以重写的模块：@section('masterCss')@overwrite @section('masterJS')@overwrite--}}
@section('pageCss')

    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop

@section('wrapper')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    <a href="{{URL::to('admin/users')}}" class="btn btn-default">返回列表</a>
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="{{URL::to('admin/users')}}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="exampleInputEmail1">用户名</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name or '用户名'}}" placeholder="用户名">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">邮箱</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$user->email or '邮箱'}}" placeholder="邮箱">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">密码</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="密码">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">确认密码</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="确认密码">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="changePassword" value="1">
                                是否修改密码
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
@stop



@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop