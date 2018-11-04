@include('layouts.headers')
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>角色管理 <small>分类，查找</small></h5>
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


            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <a  href="" class="btn btn-warning  btn-sm "><i class="glyphicon glyphicon-refresh"></i>  重置 / 刷新</a>
                            <!--bootstrap-->

                            <div role="form" class=" form-group-sm"  style="width: 650px;"  >
                                <label>关键字&nbsp;&nbsp;</label>
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="sr-only" >关键字</label>
                                    <input type="text" placeholder="关键字" id="exampleInputEmail2" class="form-control" name="name" >
                                </div>
                                <div class="form-group">
                                    <div class="form-group" id="data_5">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input class="form-control layer-date" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})">
                                            <span class="input-group-addon">到</span>
                                            <input class="form-control layer-date" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-white btn-sm" id="select">查询</button>
                            </div>
                            <br>


                        </div>
                    </div>

                </div>
                <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">

                    <thead >
                    <tr role="row">
                        <th class="sorting_asc_disabled text-center" tabindex="0" >角色名称</th>
                        <th class="sorting_asc_disabled text-center"  >角色所拥有的所有权限</th>
                        <th class="sorting_asc_disabled text-center"  >分配权限</th>
                    </thead>
                    <tbody id="ok-create">
                    @foreach($role as $key => $value)
                        <tr class="gradeA odd {$value.id} select-remove">
                            <td class="text-center ">{{$value->name}}</td>
                            <td class="text-center ">
                                @foreach($value->permissions as $key => $values)
                                    {{$values->name}} ,
                                @endforeach
                            </td>
                            <td class="text-center ">

                                <a  class="btn btn-info" href="/role_permission/distribution/{{$value->id}}">分配权限</a>
                                <a class="btn btn-warning" href="/role_permission/{{$value->id}}/edit">修改</a>

                                <a class="btn btn-danger" href="">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">
                            {{$role->links()}}
                        </div>
                    </div>

                </div>


            </div>
@include('layouts.footers')
