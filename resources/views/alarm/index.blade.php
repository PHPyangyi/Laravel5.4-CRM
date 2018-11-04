@include('layouts.headers')
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>库存警告 </h5>
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
                        <th class="sorting_asc_disabled text-center"  >计量单位</th>
                        <th class="sorting_asc_disabled text-center"  >采购价格</th>
                        <th class="sorting_asc_disabled text-center"  >销售价格</th>
                        <th class="sorting_asc_disabled text-center"  >库存</th>
                        <th class="sorting_asc_disabled text-center"  >入库总量</th>
                        <th class="sorting_asc_disabled text-center"  >出库总量</th>
                        <th class="sorting_asc_disabled text-center"  >库存报警</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>

                    </thead>
                    <tbody id="ok-create">
                    @foreach($product as $key => $value)
                    <tr class="gradeA odd  {$value.id}  select-remove">
                        <td class="text-center  ">{{$value->sn}}</td>
                        <td class="text-center">{{$value->name}}</td>
                        <td class="text-center  ">{{$value->type}}]</td>
                        <td class="text-center">{{$value->unit}}</td>
                        <td class="text-center  ">{{$value->pro_price}}</td>
                        <td class="text-center">{{$value->sell_price}}</td>
                        <td class="text-center  ">{{$value->inventory}}</td>
                        <td class="text-center">{{$value->inventory_in}}</td>
                        <td class="text-center  ">{{$value->inventory_out}}</td>
                        <td class="text-center">{{$value->inventory_alarm}}</td>
                        <td class="text-center  ">{{$value->created_at}}</td>
                    </tr>
                    @endforeach

                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">

                        </div>
                    </div>

                </div>

            </div>
@include('layouts.footers')
