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
                    <a href="{{URL::to('admin/permissions/create')}}" class="btn btn-info">添加许可规则</a>
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
                                <th class="">规则名称</th>
                                <th class="">标签</th>
                                <th class="">添加时间</th>
                                <th class="">修改时间</th>
                                <th class="">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php dd($permissions);?>
                            @if(!empty($permissions))
                            @foreach($permissions as $key=>$permission)
                            <tr>
                                <td><input type="checkbox" name=""></td>
                                <td>{{$permission->id}}</td>
                                <td class="">{{$permission->name}}</td>
                                <td class="">{{$permission->label or '-'}}</td>
                                <td class="">{{$permission->created_at}}</td>
                                <td class="">{{$permission->updated_at}}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-info margin-top-5">查看详情</a>
                                    <a href="" class="btn btn-sm btn-success margin-top-5">修改</a>
                                    <form action="{{ URL('admin/permissions/'.$permission->id)}}" method="POST" style="display: inline;">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-sm btn-danger margin-top-5">删除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <div class="alert alert-info">暂无数据</div>
                            @endif
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>

    <?php echo $permissions->render(); ?>
@stop



@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop