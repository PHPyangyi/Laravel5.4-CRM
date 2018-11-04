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
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <a id="outlib"><span class="fa fa-truck"></span> 出库</a> &nbsp;&nbsp;&nbsp;&nbsp;

                            <button  name="all" id="checkboxAll"  class="btn btn-primary btn-sm" type="button"><i class="fa fa-check"></i>&nbsp;全选</button>
                            <button  name="no"  id="checkedNo" class="btn btn-danger btn-sm" type="button"><i class="glyphicon glyphicon-remove"></i>&nbsp;全不选</button>
                            <button  name="reverse"id="checkedRev"  class="btn btn-default btn-sm" type="button"><i class="glyphicon glyphicon-random"></i>&nbsp;反选</button>
                            <a  href="" class="btn btn-warning  btn-sm "><i class="glyphicon glyphicon-refresh"></i>  重置 / 刷新</a>
                            <p></p>

                            <!--bootstrap-->

                            <div role="form" class=" form-group-sm"  style="width: 650px;"  >
                                <label>关键字&nbsp;&nbsp;</label>
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="sr-only" >用户名</label>
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
                        <th style="width: 2%;background-color: white"><input type="checkbox" disabled></th>
                        <th class="sorting_asc_disabled text-center" tabindex="0" >订单号</th>
                        <th class="sorting_asc_disabled text-center"  >产品编号</th>
                        <th class="sorting_asc_disabled text-center"  >产品名称</th>
                        <th class="sorting_asc_disabled text-center"  >销售价格</th>
                        <th class="sorting_asc_disabled text-center"  >出货量</th>
                        <th class="sorting_asc_disabled text-center"  >发货员</th>
                        <th class="sorting_asc_disabled text-center"  >下单员</th>
                        <th class="sorting_asc_disabled text-center"  >状态</th>
                        <th class="sorting_asc_disabled text-center"  >出库时间</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>
                    </tr>
                    </thead>
                    <tbody id="ok-create">
                    @foreach($outlib as $key => $value)
                    <tr>
                        <td class="sorting_1">
                            <div class="text-center">
                                <input type="checkbox" name="check[]"  yang="yang"  value="{{$value->id}}" >
                            </div>
                        </td>
                        <td class="text-center">{{$value->order_sn}}</td>
                        <td class="text-center">{{$value->product->sn}}</td>
                        <td class="text-center">{{$value->product->name}}</td>
                        <td class="text-center">{{$value->product->sell_price}}</td>
                        <td class="text-center">{{$value->number}}</td>
                        <td class="text-center">{{$value->clerk}}</td>
                        <td class="text-center">{{$value->enter}}</td>
                        <td class="text-center">{{$value->state}}</td>
                        <td class="text-center">{{$value->dispose_time}}</td>
                        <td class="text-center">{{$value->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">
                           {{$outlib->links()}}
                        </div>
                    </div>
                </div>
            </div>
@section('customs-js')
    <script src="../js/outlib.js"></script>
@endsection
@include('layouts.footers')
