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
                    <a href="" class="fa-mail-reply">返回</a>
                    <span>role 详情</span>
                </header>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>规则名称</dt>
                        <dd>{{$role->name}}</dd>
                        <dt>标签</dt>
                        <dd>{{$role->label}}</dd>
                        <dt>描述</dt>
                        <dd>{{$role->description}}</dd>
                        <dt>添加时间</dt>
                        <dd>{{$role->created_at}}</dd>
                        <dt>修改时间</dt>
                        <dd>{{$role->updated_at}}</dd>
                    </dl>
                </div>
            </section>
        </div>
    </div>
@stop
@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop