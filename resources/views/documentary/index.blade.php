@include('layouts.headers')
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>跟单记录</h5>
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
            <div class="modal" tabindex="-1"  id="myModal" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <form id="reg">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 新建跟单</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body">
                            <div class="form-horizontal">

                                <div class="form-group">
                                    <label class="control-label">跟单标题</label>
                                    <input type="text" class="form-control "  id="title"  name="title">
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">关联公司</label>
                                    <div class=" input-group">
                                        <input type="text" class="form-control "    id="client_company"   name="client_company" >
                                        <div class="input-group-addon" id="tests"><span class="glyphicon glyphicon-search"></span></div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class=" control-label">跟单员</label>
                                    <div class=" input-group">
                                        <input type="text" class="form-control "  name="staff_name" id="staff_name" staff_id=""  readonly  style="background: white">
                                        <div class="input-group-addon " id="test"><span class="glyphicon glyphicon-search"></span></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">跟单方式</label>
                                    <select class="form-control" id="way" name="way">
                                        <option></option>
                                        <option value="电话沟通">电话沟通</option>
                                        <option value="上门拜访">上门拜访</option>
                                        <option value="网络咨询">网络咨询</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">进展情况</label>
                                    <select class="form-control" id="evolve" name="evolve">
                                        <option></option>
                                        <option value="谈判中">谈判中</option>
                                        <option value="已放弃">已放弃</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">详情备注</label>
                                    <input type="text" class="form-control "  placeholder="20字以内备注说明"  id="remark"  name="remark">
                                </div>


                            </div>
                        </div>
                        <!-- 注脚 -->
                            <div class="modal-footer">
                                <button   class="btn btn-primary  "  id="submit" > <span class="glyphicon glyphicon-ok">保存</span>  </button>
                                <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{--选择公司--}}
            <div class="modal" tabindex="-1"  id="select_client" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content"  style="width: 750px;">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 选择关联公司</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto;max-height: 550px;" >
                            <div class="form-horizontal">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr >
                                        <th class="text-center">序号</th>
                                        <th  class="text-center">公司名称</th>
                                        <th  class="text-center">联系人</th>
                                        <th  class="text-center">移动电话</th>
                                        <th  class="text-center">选择客户</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="add-ok-client">



                                    </tbody>
                                </table>
                                <div>
                                    <ul class="pager" count="{{$client->count()}}" id="pages-client">
                                        <li class="disabled"><a href="#"  id="prve-client" prev="no">上一页</a></li>
                                        <li><a href="#" style="margin-left: 20px" next="1" id="next-client" >下一页</a></li>
                                        <li style="margin-left: 20px;">
                                            <select name="" id="jump-client">
                                            </select>
                                        </li>
                                        <li><a href="#" id="jumps-client">跳转</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- 注脚 -->
                    </div>
                </div>
            </div>




            {{--选择员工--}}
            <div class="modal" tabindex="-1"  id="select_staff" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content"  style="width: 750px;">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 选择档案</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto;max-height: 550px;" >
                            <div class="form-horizontal">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr >
                                        <th class="text-center">序号</th>
                                        <th  class="text-center">工号</th>
                                        <th  class="text-center">姓名</th>
                                        <th  class="text-center">性别</th>
                                        <th  class="text-center">身份证</th>
                                        <th  class="text-center">职位</th>
                                        <th  class="text-center">选择</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="add-ok">

                                    </tbody>
                                </table>
                                <div>
                                    <ul class="pager" count="{{$staff->count()}}" id="pages">
                                        <li class="disabled"><a href="#"  id="prve" prev="no">上一页</a></li>
                                        <li><a href="#" style="margin-left: 20px" next="1" id="next" >下一页</a></li>
                                        <li style="margin-left: 20px;">
                                            <select name="" id="jump">
                                            </select>
                                        </li>
                                        <li><a href="#" id="jumps">跳转</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- 注脚 -->
                    </div>
                </div>
            </div>



            <!--edit-->
            <div class="modal" tabindex="-1"  id="myModals" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <form id="regs">
                            <!-- 头部 -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                                <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 修改跟单</span>  </h4>
                            </div>
                            <!-- 主体 -->
                            <div class="modal-body">
                                <div class="form-horizontal">

                                    <div class="form-group">
                                        <label class="control-label">跟单标题</label>
                                        <input type="text" class="form-control "  id="titles"  name="titles">
                                    </div>

                                    <div class="form-group">
                                        <label class=" control-label">关联公司</label>
                                        <div class=" input-group">
                                            <input type="text" class="form-control "    id="client_companys"   name="client_companys" >
                                            <div class="input-group-addon" id="tests-update"><span class="glyphicon glyphicon-search"></span></div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class=" control-label">跟单员</label>
                                        <div class=" input-group">
                                            <input type="text" class="form-control "  name="staff_names" id="staff_names" staff_id=""  readonly  style="background: white">
                                            <div class="input-group-addon " id="test-update"><span class="glyphicon glyphicon-search"></span></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">跟单方式</label>
                                        <select class="form-control" id="ways" name="ways">
                                            <option></option>
                                            <option value="电话沟通">电话沟通</option>
                                            <option value="上门拜访">上门拜访</option>
                                            <option value="网络咨询">网络咨询</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">进展情况</label>
                                        <select class="form-control" id="evolves" name="evolves">
                                            <option></option>
                                            <option value="谈判中">谈判中</option>
                                            <option value="已放弃">已放弃</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">详情备注</label>
                                        <input type="text" class="form-control "  placeholder="20字以内备注说明"  id="remarks"  name="remarks">
                                    </div>


                                </div>
                            </div>
                            <!-- 注脚 -->
                            <div class="modal-footer">
                                <button   class="btn btn-primary  "  id="submits" > <span class="glyphicon glyphicon-ok">保存</span>  </button>
                                <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            {{--选择公司--}}
            <div class="modal" tabindex="-1"  id="select_client-update" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content"  style="width: 750px;">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 选择关联公司</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto;max-height: 550px;" >
                            <div class="form-horizontal">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr >
                                        <th class="text-center">序号</th>
                                        <th  class="text-center">公司名称</th>
                                        <th  class="text-center">联系人</th>
                                        <th  class="text-center">移动电话</th>
                                        <th  class="text-center">选择客户</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="add-ok-client-update">



                                    </tbody>
                                </table>
                                <div>
                                    <ul class="pager" count="{{$client->count()}}" id="pages-client-update">
                                        <li class="disabled"><a href="#"  id="prve-client-update" prev="no">上一页</a></li>
                                        <li><a href="#" style="margin-left: 20px" next="1" id="next-client-update" >下一页</a></li>
                                        <li style="margin-left: 20px;">
                                            <select name="" id="jump-client-update">
                                            </select>
                                        </li>
                                        <li><a href="#" id="jumps-client-update">跳转</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- 注脚 -->
                    </div>
                </div>
            </div>




            {{--选择员工--}}
            <div class="modal" tabindex="-1"  id="select_staff-update" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content"  style="width: 750px;">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 选择档案</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto;max-height: 550px;" >
                            <div class="form-horizontal">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr >
                                        <th class="text-center">序号</th>
                                        <th  class="text-center">工号</th>
                                        <th  class="text-center">姓名</th>
                                        <th  class="text-center">性别</th>
                                        <th  class="text-center">身份证</th>
                                        <th  class="text-center">职位</th>
                                        <th  class="text-center">选择</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="add-ok-update">

                                    </tbody>
                                </table>
                                <div>
                                    <ul class="pager" count="{{$staff->count()}}" id="pages-update">
                                        <li class="disabled"><a href="#"  id="prve-update" prev="no">上一页</a></li>
                                        <li><a href="#" style="margin-left: 20px" next="1" id="next-update" >下一页</a></li>
                                        <li style="margin-left: 20px;">
                                            <select name="" id="jump-update">
                                            </select>
                                        </li>
                                        <li><a href="#" id="jumps-update">跳转</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- 注脚 -->
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

                            <div role="form" class=" form-group-sm" style="width: 1480px;">
                                <label>关键字：&nbsp;&nbsp;</label>
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="sr-only" ></label>
                                    <input type="text" placeholder="关键字" id="exampleInputEmail2" class="form-control" name="accounts" >
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
                                <button class="btn btn-white btn-sm" id="select" >查询</button>
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
                        <th class="sorting_asc_disabled text-center" tabindex="0" >跟单编号</th>
                        <th class="sorting_asc_disabled text-center"  >跟单标题</th>
                        <th class="sorting_asc_disabled text-center"  >公司名称</th>
                        <th class="sorting_asc_disabled text-center"  >跟单员</th>
                        <th class="sorting_asc_disabled text-center"  >跟单方式</th>
                        <th class="sorting_asc_disabled text-center"  >进展情况</th>
                        <th class="sorting_asc_disabled text-center"  >录入员</th>
                        <th class="sorting_asc_disabled text-center"  >简单备注</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>
                    </thead>
                    <tbody id="ok-create">
                  @foreach($documentary as $key => $value)
                    <tr class="gradeA odd {{$value->id}} select-remove">
                        <td class="sorting_1">
                            <div class="text-center">
                                <input type="checkbox" name="check[]"  yang="yang"  value="{{$value->id}}" >
                            </div>
                        </td>
                        <td class="text-center">{{$value->sn}}</td>
                        <td class="text-center">{{$value->title}}</td>
                        <td class="text-center">{{$value->client_company}}</td>
                        <td class="text-center">{{$value->staff_name}}</td>
                        <td class="text-center">{{$value->way}}</td>
                        <td class="text-center">{{$value->evolve}}</td>
                        <td class="text-center">{{$value->enter}}</td>
                        <td class="text-center">{{$value->remark}}</td>
                        <td class="text-center">{{$value->created_at}}</td>

                    </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">
                            {{$documentary->links()}}
                        </div>
                    </div>

                </div>
            </div>
@section('customs-js')
     <script src="../js/documentary.js"></script>
@endsection
@include('layouts.footers')
