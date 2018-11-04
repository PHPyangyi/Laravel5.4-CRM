@include('layouts.headers')
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>产品信息</h5>
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
                <div class="modal-dialog" style="width: 900px; ">
                    <!-- 内容声明 -->
                    <form  id="reg">
                    <div class="modal-content">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 新建产品</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto; height: 600px;">
                            <div class="form-horizontal">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">产品名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  placeholder="请输入产品编号" name="name" id="name" >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">产品编号</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  placeholder="请输入产品编号" name="sn" id="sn" >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">产品类型</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " id="type"  name="type">
                                            <option value=""></option>
                                            <option value="办公耗材">办公耗材</option>
                                            <option value="数码产品">数码产品</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">采购价格</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  placeholder="请输入采购价格" name="pro_price" id="pro_price" >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">销售价格</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  placeholder="请输入销售价格" name="sell_price" id="sell_price" >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">计量单位</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  placeholder="请输入计量单位量" name="unit" id="unit" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">库存报警</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  placeholder="请输入库存报警数" name="inventory_alarm" id="inventory_alarm" >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">详情备注</label>
                                    <div class="col-sm-10">
                                        <textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%; " rows="10"></textarea>      </div>
                                </div>
                            </div>
                        </div>
                        <!-- 注脚 -->
                        <div class="modal-footer">
                            <button   class="btn btn-primary"  id="submit" > <span class="glyphicon glyphicon-ok">保存</span>  </button>
                            <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>


            <!--edit-->
            <div class="modal " tabindex="-1"  id="myModals" data-backdrop="static" >
                <div class="modal-dialog" style="width: 900px; ">
                    <!-- 内容声明 -->
                    <form  id="regs">
                        <input type="hidden" id="check_id" >
                        <div class="modal-content">
                            <!-- 头部 -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                                <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 新建产品</span>  </h4>
                            </div>
                            <!-- 主体 -->
                            <div class="modal-body" style="overflow: auto; height: 600px;">
                                <div class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">产品名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control "  placeholder="请输入产品编号" name="names" id="names" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">产品编号</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control "  placeholder="请输入产品编号" name="sns" id="sns" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">产品类型</label>
                                        <div class="col-sm-10">
                                            <select class=" form-control " id="types"  name="types">
                                                <option value=""></option>
                                                <option value="办公耗材">办公耗材</option>
                                                <option value="数码产品">数码产品</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">采购价格</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control "  placeholder="请输入采购价格" name="pro_prices" id="pro_prices" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">销售价格</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control "  placeholder="请输入销售价格" name="sell_prices" id="sell_prices" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">计量单位</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control "  placeholder="请输入计量单位量" name="units" id="units" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">库存报警</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control "  placeholder="请输入库存报警数" name="inventory_alarms" id="inventory_alarms" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">详情备注</label>
                                        <div class="col-sm-10">
                                            <textarea name="contents" class="common-textarea" id="contents" cols="30" style="width: 98%; " rows="10"></textarea>      </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 注脚 -->
                            <div class="modal-footer">
                                <button   class="btn btn-primary"  id="submits" > <span class="glyphicon glyphicon-ok">保存</span>  </button>
                                <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!--list-->
            <div class="modal" tabindex="-1"  id="myModalss" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 产品信息详情</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body">
                            <table class="table table-hover table-bordered text-center">
                                <tr>
                                    <th colspan="5" align="left"> 产品信息详情</th>
                                </tr>
                                <tr>
                                    <td width="15%">产品编号：</td>
                                    <td width="80%"  id="details_sn"></td>
                                </tr>
                                <tr>
                                    <td>产品名称：</td>
                                    <td id="details_name"></td>
                                </tr>
                                <tr>
                                    <td>产品类型：</td>
                                    <td id="details_type"></td>
                                </tr>
                                <tr>
                                    <td>计量单位：</td>
                                    <td id="details_unit"></td>
                                </tr>
                                <tr>
                                    <td>采购价格：</td>
                                    <td id="details_pro_price"></td>
                                </tr>
                                <tr>
                                    <td>销售价格：</td>
                                    <td id="details_sell_price"></td>
                                </tr>
                                <tr>
                                    <td>出库总量：</td>
                                    <td id="details_inventory_in"></td>
                                </tr>
                                <tr>
                                    <td>创建时间：</td>
                                    <td id="details_create_time"></td>
                                </tr>
                                <tr>
                                    <td>详情备注：</td>
                                    <td id="details_details"></td>
                                </tr>
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
                        <th class="sorting_asc_disabled text-center" tabindex="0" >产品编号</th>
                        <th class="sorting_asc_disabled text-center"  >产品名称</th>
                        <th class="sorting_asc_disabled text-center"  >产品类型</th>
                        <th class="sorting_asc_disabled text-center"  >计量单位</th>
                        <th class="sorting_asc_disabled text-center"  >采购价格</th>
                        <th class="sorting_asc_disabled text-center"  >销售价格</th>
                        <th class="sorting_asc_disabled text-center"  >库存</th>
                        <th class="sorting_asc_disabled text-center"  >入库总量</th>
                        <th class="sorting_asc_disabled text-center"  >出库总量</th>
                        <th class="sorting_asc_disabled text-center"  >库存报警</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>
                        <th class="sorting_asc_disabled text-center"  >详情</th>
                    </thead>
                    <tbody id="ok-create">
                   @foreach($product as $key => $value)
                    <tr class="gradeA odd  {{$value->id}}  select-remove">
                        <td class="sorting_1">
                            <div class="text-center">
                                <input type="checkbox" name="check[]"  yang="yang"  value="{{$value->id}}" >
                            </div>
                        </td>
                        <td class="text-center  ">{{$value->sn}}</td>
                        <td class="text-center">{{$value->name}}</td>
                        <td class="text-center  ">{{$value->type}}</td>
                        <td class="text-center">{{$value->unit}}</td>
                        <td class="text-center  ">{{$value->pro_price}}</td>
                        <td class="text-center">{{$value->sell_price}}</td>
                        <td class="text-center  ">{{$value->inventory}}</td>
                        <td class="text-center">{{$value->inventory_in}}</td>
                        <td class="text-center  ">{{$value->inventory_out}}</td>
                        <td class="text-center">{{$value->inventory_alarm}}</td>
                        <td class="text-center  ">{{$value->created_at}}</td>
                        <td class="text-center">
                            <a class="details"   details_id="{{$value->id}}"><i class="fa fa-file-text-o"></i>  </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">显示 @if(!isset($_GET['page']) ||$_GET['page']==1) 1 @else {{$_GET['page']*10+1}}  @endif  到 @if(!isset($_GET['page']) ||$_GET['page']==1) 10 @else {{$_GET['page']*10+10}}  @endif  项，共  {{$product->count()}} 项数据</div>
                        <div class="text-right" id="page">
                            {{$product->links()}}
                        </div>
                    </div>
                </div>
            </div>
@section('customs-js')
     <script src="../js/product.js"></script>
@endsection
@include('layouts.footers')

