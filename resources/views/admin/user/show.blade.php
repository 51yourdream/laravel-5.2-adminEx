@extends('_layout.main1')
{{--需要处理的变更：  $pageTitle $pageKeywords $pageDescription --}}
{{--可以重写的模块：@section('masterCss')@overwrite @section('masterJS')@overwrite--}}
@section('pageCss')

    {{--当前页面独有的样式--}}
@stop

@section('wrapper')
    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {{--<div class="panel-body">--}}
                    {{--<dl class="dl-horizontal">--}}
                        {{--<dt>规则名称</dt>--}}
                        {{--<dd>{{$role->name}}</dd>--}}
                        {{--<dt>标签</dt>--}}
                        {{--<dd></dd>--}}
                        {{--<dt>描述</dt>--}}
                        {{--<dd></dd>--}}
                        {{--<dt>添加时间</dt>--}}
                        {{--<dd>{{$role->created_at}}</dd>--}}
                        {{--<dt>修改时间</dt>--}}
                        {{--<dd>{{$role->updated_at}}</dd>--}}
                    {{--</dl>--}}
                {{--</div>--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<h3 class="panel-title">详情描述</h3>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--{{$role->description}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                <ul class="list-group">
                    <li class="list-group-item list-group-item-success">
                        <span><em>用户名：</em></span>
                        <span>{{$user->name}}</span>
                    </li>
                    <li class="list-group-item list-group-item-info">
                        <span><em>邮箱：</em></span>
                        <span>{{$user->email}}</span>
                    </li>
                    <li class="list-group-item list-group-item-warning">
                        <span><em>角色：</em></span>
                        <span>{{$role_name}}</span>
                    </li>
                </ul>
            </section>
        </div>
    </div>
@stop
@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop