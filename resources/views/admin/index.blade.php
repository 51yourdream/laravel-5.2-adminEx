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
    主要内容区
@stop



@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop