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
                    <a href="{{URL::to('admin/roles/create')}}" class="btn btn-info">添加角色</a>
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
                            @if(!empty($roles))
                            @foreach($roles as $key=>$role)
                            <tr>
                                <td><input type="checkbox" name=""></td>
                                <td>{{$role->id}}</td>
                                <td class="">{{$role->name}}</td>
                                <td class="">{{$role->label or '-'}}</td>
                                <td class="">{{$role->created_at}}</td>
                                <td class="">{{$role->updated_at}}</td>
                                <td>
                                    <a href="{{URL::to('admin/roles').'/'.$role->id}}" class="btn btn-sm btn-info margin-top-5">查看权限</a>
                                    <div type="2" title="查看权限" shadeClose=0 shade="0.5" with="600px" height="400px" content="{{asset('admin/givePermission/index?id=').$role->id}}" class="btn btn-sm btn-warning margin-top-5" role="layer">查看规则</div>
                                    <a href="{{URL::to('admin/roles').'/'.$role->id.'/edit'}}" class="btn btn-sm btn-success margin-top-5">修改</a>
                                    <form action="{{ URL('admin/roles/'.$role->id)}}" method="POST" style="display: inline;">
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

    <?php echo $roles->render(); ?>
@stop



@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop