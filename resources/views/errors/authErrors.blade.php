@extends('_layout.main')
@section('pageCss')
    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop
@section('wrapper')
    <div class="row">
        <div class="alert alert-info">
            <h2 class="text-center">您没有权限操作！</h2>
        </div>
    </div>
@stop

@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop