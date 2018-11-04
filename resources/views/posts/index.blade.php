@include('layouts.headers')
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>职位部门 <small>分类，查找</small></h5>
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

            <!--成功-->
            <div class="modal" tabindex="-1"  id="ok" data-backdrop="static" >
                <div class="modal-dialog" style="width: 180px;">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <!-- 头部 -->
                        <!-- 主体 -->
                        <div class="modal-body">
                            <img src="../home/img/loading.gif" alt="" style="margin-left: -20px;" id="ok-img" > <span id="ok-text">&nbsp;&nbsp;数据交互中...</span>
                        </div>
                        <!-- 注脚 -->

                    </div>
                </div>
            </div>

            <!--add-->
            <div class="modal  " tabindex="-1"  id="myModal" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <form id="reg">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 新增职位</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body">
                            <div  class="form-horizontal"   >
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">职位名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " placeholder="请输入职位名称" name="name" id="name" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 注脚 -->
                        <div class="modal-footer">
                            <button   class="btn btn-primary"  id="submit" > <span class="glyphicon glyphicon-ok">保存</span>  </button>
                            <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                        </div>

                        </form>
                    </div>
                </div>
            </div>


            <!--edit-->
            <div class="modal  " tabindex="-1"  id="myModals" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <form id="regs">
                            <!-- 头部 -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                                <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 修改职位</span>  </h4>
                            </div>
                            <!-- 主体 -->
                            <div class="modal-body">
                                <div  class="form-horizontal"   >
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">职位名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " placeholder="请输入职位名称" name="names" id="names"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 注脚 -->
                            <div class="modal-footer">
                                <button   class="btn btn-primary"  id="submits" > <span class="glyphicon glyphicon-ok">保存</span>  </button>
                                <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> 新增</a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="edit"> <span class="glyphicon glyphicon-pencil"></span> 编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a  id="delete"> <span class="glyphicon glyphicon-trash"></span>  删除</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <button  name="all" id="checkboxAll"  class="btn btn-primary btn-sm" type="button"><i class="fa fa-check"></i>&nbsp;全选</button>
                            <button  name="no"  id="checkedNo" class="btn btn-danger btn-sm" type="button"><i class="glyphicon glyphicon-remove"></i>&nbsp;全不选</button>
                            <button  name="reverse"id="checkedRev"  class="btn btn-default btn-sm" type="button"><i class="glyphicon glyphicon-random"></i>&nbsp;反选</button>
                            <a  href="" class="btn btn-warning  btn-sm "><i class="glyphicon glyphicon-refresh"></i>  重置 / 刷新</a>
                            <p></p>

                            <!--bootstrap-->

                            <div role="form" class=" form-group-sm"  style="width: 800px;"  >
                                <label>关键字&nbsp;&nbsp;</label>
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="sr-only" >用户名</label>
                                    <input type="text" placeholder="职位" id="exampleInputEmail2" class="form-control" name="name" >
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
                        <th class="sorting_asc_disabled" tabindex="0" aria-controls="DataTables_Table_0"  style="width: 30px;">
                            <div class="text-center">
                                <input type="checkbox" disabled >
                            </div>

                        </th>
                        <th class="sorting_asc_disabled text-center" tabindex="0" >职位名称</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>
                    </thead>
                    <tbody id="ok-create">
                    @foreach($post as $key=>$value)
                        <tr class="gradeA odd {{$value->id}} select-remove">
                            <td class="sorting_1">
                                <div class="text-center">
                                    <input type="checkbox" name="check[]"  yang="yang"  value="{{$value->id}}" >
                                </div>
                            </td>
                            <td class="text-center ">{{$value->name}}</td>
                            <td class="text-center">{{$value->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">显示 @if(!isset($_GET['page']) ||$_GET['page']==1) 1 @else {{$_GET['page']*10+1}}  @endif  到 @if(!isset($_GET['page']) ||$_GET['page']==1) 10 @else {{$_GET['page']*10+10}}  @endif  项，共  {{$post->count()}} 项数据</div>
                        <div class="text-right" id="page">
                            {{$post->links()}}
                        </div>
                    </div>

                </div>
            </div>

@section('customs-js')
        <script src="../js/posts.js"></script>
@endsection

@include('layouts.footers')
