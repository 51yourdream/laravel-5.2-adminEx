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
                    <a href="{{URL::to('admin/roles')}}" class="btn btn-default">返回列表</a>
                </header>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" method="post" action="{{URL::to('admin/roles')}}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="name">规则名称</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="规则名称">
                        </div>
                        <div class="form-group">
                            <label for="label">标签</label>
                            <input type="text" class="form-control" name="label" id="label" value="{{old('label')}}" placeholder="标签">
                        </div>
                        <div class="form-group">
                            <label for="description">描述</label>
                            <textarea name="description" class="form-control" id="description">{{old('description')}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">添加</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@stop



@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop