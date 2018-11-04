@include('layouts.headers')
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>采购记录</h5>
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
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 采购详情</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body">
                            <table class="table table-hover table-bordered text-center">
                                <tr>
                                    <th colspan="5" align="left"> 入库详情</th>
                                </tr>
                                <tr>
                                    <td width="15%">产品名称：</td>
                                    <td width="80%"  id="details_name"></td>
                                </tr>
                                <tr>
                                    <td>产品编号：</td>
                                    <td id="details_sn"></td>
                                </tr>
                                <tr>
                                    <td>产品类型：</td>
                                    <td id="details_type"></td>
                                </tr>
                                <tr>
                                    <td>采购价格：</td>
                                    <td id="details_pro_price"></td>
                                </tr>
                                <tr>
                                    <td>入库数量：</td>
                                    <td id="details_number"></td>
                                </tr>
                                <tr>
                                    <td>经办人：</td>
                                    <td id="details_staff_name"></td>
                                </tr>
                                <tr>
                                    <td>入库方式：</td>
                                    <td id="details_mode"></td>
                                </tr>
                                <tr>
                                    <td>入库说明：</td>
                                    <td id="details_mode_explain"></td>
                                </tr>
                                <tr>
                                    <td>录入员：</td>
                                    <td id="details_enter"></td>
                                </tr>
                                <tr>
                                    <td>创建时间：</td>
                                    <td id="details_create_time"></td>
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
                        <th class="sorting_asc_disabled text-center" tabindex="0" >产品编号</th>
                        <th class="sorting_asc_disabled text-center"  >产品名称</th>
                        <th class="sorting_asc_disabled text-center"  >产品类型</th>
                        <th class="sorting_asc_disabled text-center"  >采购价格</th>
                        <th class="sorting_asc_disabled text-center"  >入库数量</th>
                        <th class="sorting_asc_disabled text-center"  >经办人</th>
                        <th class="sorting_asc_disabled text-center"  >入库方式</th>
                        <th class="sorting_asc_disabled text-center"  >入库方式说明</th>
                        <th class="sorting_asc_disabled text-center"  >录入员</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>
                        <th class="sorting_asc_disabled text-center"  >详情</th>
                    </thead>
                    <tbody id="ok-create">
                    @foreach($inlib as $key => $value)
                    <tr class="gradeA odd {{$value->id}} select-remove">
                        <td class="text-center">{{$value->Product->sn}}</td>
                        <td class="text-center">{{$value->product->name}}</td>
                        <td class="text-center">{{$value->product->type}}</td>
                        <td class="text-center">{{$value->product->pro_price}}</td>
                        <td class="text-center">{{$value->number}}</td>
                        <td class="text-center">{{$value->staff_name}}</td>
                        <td class="text-center">{{$value->mode}}</td>
                        <td class="text-center">{{$value->mode_explain}}</td>
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
                            {{$inlib->links()}}
                        </div>
                    </div>

                </div>
            </div>
@section('customs-js')
      <script src="../js/procure.js"></script>
@endsection
@include('layouts.footers')
