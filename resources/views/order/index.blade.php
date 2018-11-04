@include('layouts.headers')
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>销售记录</h5>
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
            <div class="modal " tabindex="-1"  id="myModal" data-backdrop="static" >
                <div class="modal-dialog"  style="width: 750px;">
                    <!-- 内容声明 -->
                    <form id="reg">
                    <div class="modal-content">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 创建订单</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto; height: 550px;">
                            <div class="form-horizontal">

                                <div class="form-group">
                                    <label class="control-label">订单标题</label>
                                    <input type="text" class="form-control "  id="title" >
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">关联跟单</label>
                                    <div class=" input-group">
                                        <input type="text" class="form-control "  id="client_company"  readonly style="background-color: white"  >
                                        <div class="input-group-addon" id="test"><span class="glyphicon glyphicon-search"></span></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">订单产品&nbsp;&nbsp;&nbsp;
                                        <a id="add"><span class="glyphicon glyphicon-plus"></span> 添加</a> &nbsp;&nbsp;
                                    </label>
                                    <div style="margin-top: 10px;">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr class="success" >
                                                <th  class="text-center">产品编号</th>
                                                <th  class="text-center">产品名称</th>
                                                <th  class="text-center">计量单位</th>
                                                <th  class="text-center">出售价</th>
                                                <th  class="text-center">数量</th>
                                                <th  class="text-center">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center" id="documentary_ok">

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label"  >订单价格：￥ <span id="q">0.00</span>  </label>

                                </div>

                                <div class="form-group">
                                    <label class=" control-label">订单金额</label>
                                    <div class=" input-group">
                                        <div class="input-group-addon" ><span class="glyphicon glyphicon-yen"></span></div>
                                        <input type="text" class="form-control "    id="x"   >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">订单备注</label>
                                    <textarea type="text" class="form-control "  placeholder="255字以内备注说明"  style="min-height: 120px;" id="remarks" ></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- 注脚 -->
                        <div class="modal-footer">
                            <a   class="btn btn-primary"  id="submit" > <span class="glyphicon glyphicon-ok">保存</span>  </a>
                            <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            {{--跟单关联--}}
            <div class="modal" tabindex="-1"  id="select_documentary" data-backdrop="static" >
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
                                        <th  class="text-center">跟单编号</th>
                                        <th  class="text-center">跟单标题</th>
                                        <th  class="text-center">所属公司</th>
                                        <th  class="text-center">跟单员</th>
                                        <th  class="text-center">选择跟单</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="add-ok">

                                    </tbody>
                                </table>
                                <div>
                                    <ul class="pager" count="{{$documentary->count()}}" id="pages">
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



            <div class="modal" tabindex="-1"  id="product" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content"  style="width: 800px;">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 选择产品</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto;max-height: 550px;" >
                            <div class="form-horizontal">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr >
                                        <th></th>
                                        <th  class="text-center">产品编号</th>
                                        <th  class="text-center">产品名称</th>
                                        <th  class="text-center">计量单位</th>
                                        <th  class="text-center">出售价</th>
                                        <th  class="text-center">库存</th>
                                        <th  class="text-center">选择数量</th>
                                        <th  class="text-center">选择跟单</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="add-ok">
                                    @foreach($product as $key => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->sn}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->unit}}</td>
                                        <td>{{$value->sell_price}}</td>
                                        <td>{{$value->inventory}}</td>
                                        <td><input type="text" style="width: 50px; text-align: center" value="0" class="num"></td>
                                        <td  class="documentary" style="cursor:pointer"><span class="glyphicon glyphicon-ok"> 选择</span></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- 注脚 -->
                    </div>
                </div>
            </div>




            <!--list-->
            <div class="modal" tabindex="-1"  id="myModalss" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content" style="width: 700px;">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 订单信息详情</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto; height: 400px;">
                            <table class="table table-hover table-bordered text-center">
                                <tr>
                                    <th colspan="5" align="left"> 订单信息详情</th>
                                </tr>
                                <tr>
                                    <td width="15%">订单标题：</td>
                                    <td width="80%"  id="order_title"></td>
                                </tr>
                                <tr>
                                    <td>订单编号：</td>
                                    <td id="order_sn"></td>
                                </tr>
                                <tr>
                                    <td>所属公司：</td>
                                    <td id="order_client_company"></td>
                                </tr>
                                <tr>
                                    <td>跟单员：</td>
                                    <td id="order_staff_name"></td>
                                </tr>
                                <tr>
                                    <td>入订单原价：</td>
                                    <td id="order_cost"></td>
                                </tr>
                                <tr>
                                    <td>订单金额：</td>
                                    <td id="order_original"></td>
                                </tr>
                                <tr>
                                    <td>录入员：</td>
                                    <td id="order_enter"></td>
                                </tr>
                                <tr>
                                    <td>创建时间：</td>
                                    <td id="order_create_time"></td>
                                </tr>
                                <tr>
                                    <td>详情：</td>
                                    <td id="order_details"></td>
                                </tr>
                            </table>


                            <table class="table-bordered table">
                                <thead>
                                <tr >
                                    <th  class="text-center">产品编号</th>
                                    <th  class="text-center">产品名称</th>
                                    <th  class="text-center">销售价格</th>
                                    <th  class="text-center">出货量</th>
                                    <th  class="text-center">状态</th>
                                    <th  class="text-center">出货时间</th>
                                </tr>
                                </thead>
                                <tbody id="list_ok">

                                </tbody>
                            </table>

                        </div>
                        <!-- 注脚 -->
                        <div class="modal-footer">
                            <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">关闭</span></a>
                        </div>
                    </div>
                </div>
            </div>



            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> 新增</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <th class="sorting_asc_disabled text-center" tabindex="0" >订单编号</th>
                        <th class="sorting_asc_disabled text-center"  >订单标题</th>
                        <th class="sorting_asc_disabled text-center"  >所属名称</th>
                        <th class="sorting_asc_disabled text-center"  >订单金额</th>
                        <th class="sorting_asc_disabled text-center"  >跟单员</th>
                        <th class="sorting_asc_disabled text-center"  >付款状态</th>
                        <th class="sorting_asc_disabled text-center"  >录入员</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>
                        <th class="sorting_asc_disabled text-center"  >详情</th>
                    </thead>
                    <tbody id="ok-create">
                    @foreach($order as $key => $value)
                    <tr class="gradeA odd {{$value->id}} select-remove">
                        <td class="sorting_1">
                            <div class="text-center">
                                <input type="checkbox" name="check[]"  yang="yang"  value="{{$value->id}}" >
                            </div>
                        </td>
                        <td class="text-center">{{$value->sn}}</td>
                        <td class="text-center">{{$value->title}}</td>
                        <td class="text-center">{{$value->documentary->client_company}}</td>
                        <td class="text-center">{{$value->original}}</td>
                        <td class="text-center">{{$value->documentary->staff_name}}</td>
                        <td class="text-center">{{$value->pay_state}}</td>
                        <td class="text-center">{{$value->enter}}</td>
                        <td class="text-center">{{$value->created_at}}</td>
                        <td class="text-center">
                            <a class="details"   details_id="{{$value->id}}"><i class="fa fa-file-text-o"></i>  </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">
                            {{$order->links()}}
                        </div>
                    </div>

                </div>
            </div>
@section('customs-js')
     <script src="../js/order.js"></script>
@endsection
@include('layouts.footers')
