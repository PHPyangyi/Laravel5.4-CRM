<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <title>@yield('title')</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    {{--alert css--}}
    <link href="../../home/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.ico"> <link href="../../home/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="../../home/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="../../home/css/animate.css" rel="stylesheet">
    <link href="../../home/css/style.css?v=4.1.0" rel="stylesheet">
    {{--日期--}}
    <link href="../../home/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>给角色分配权限 <small>分类，add</small></h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="table_data_tables.html#">选项1</a>
                    </li>
                    <li><a href="table_data_tables.html#">选项2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <form action="/role_permission" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label>规则名称</label>
                    <input type="hidden" name="role_id"  id="role_id" value="{{$role->id}}">
                    <input type="text" id="name" name="name" class="form-control" value="{{$role->name}}"  disabled>
                </div>


                <div class="form-group">
                    <label>选择权限</label>
                    <div >
                        @foreach($permission as $key => $value)
                        <label class="checkbox-inline"><input type="checkbox"  name="permissions_id[]" value="{{$value->id}}" >{{$value->name}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info">提交</button>
                </div>
            </form>
            <a href="/permission" class="btn btn-warning">返回</a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
@endif
        <!-- 全局js -->
            <script src="../../home/js/jquery.min.js?v=2.1.4"></script>
            <script src="../../home/js/bootstrap.min.js?v=3.3.6"></script>
            <script src="../../home/js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="../../home/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
            <script src="../../home/js/plugins/layer/layer.min.js"></script>

            <!-- 自定义js -->
            <script src="../../home/js/hplus.js?v=4.1.0"></script>
            <script type="text/javascript" src="../home/js/contabs.js"></script>

            <!-- 第三方插件 -->
            <script src="../../home/js/plugins/pace/pace.min.js"></script>
            <script src="../../js/jquery.validate.js"></script>



            <!-- alert插件-->
            <!-- Sweet alert -->
            <script src="../../home/plugins/sweetalert/sweetalert.min.js"></script>
            {{--自定义插件--}}
            <script src="../../js/checked.js"></script>

            {{--日期插件--}}
        <!-- Data picker -->
            <script src="../../home/js/plugins/layer/laydate/laydate.js"></script>
            {{--编辑器插件--}}

            <script src="../../home/ueditor/ueditor.config.js"></script>
            <script src="../../home/ueditor/ueditor.all.js"></script>
            <script src="../../home/ueditor/lang/zh-cn/zh-cn.js"></script>
            </body>

            </html>
