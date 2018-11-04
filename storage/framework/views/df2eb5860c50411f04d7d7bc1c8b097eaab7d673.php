<?php echo $__env->make('layouts.headers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <div class="modal" tabindex="-1"  id="myModal" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 创建工作</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">工作名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " placeholder="请输入工作名称"  id="title" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">工作类型</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " id="type" >
                                            <option value=""></option>
                                            <option  value="业务" >业务</option>
                                            <option  value="内勤" >内勤</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-2">开始时间</label>
                                    <div class="col-sm-10">
                                        <input  id="start_date"  class="form-control layer-date form-control" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"   name="dimission_date" >
                                        <label class="laydate-icon"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2">结束时间</label>
                                    <div class="col-sm-10">
                                        <input  id="end_date" class="form-control layer-date form-control" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"   name="dimission_date" >
                                        <label class="laydate-icon"></label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- 注脚 -->
                        <div class="modal-footer">
                            <a   class="btn btn-primary"  id="submit" > <span class="glyphicon glyphicon-ok">保存</span>  </a>
                            <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                        </div>
                    </div>
                </div>
            </div>



            <!--add-->
            <div class="modal " tabindex="-1"  id="myModals" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content" style="width: 750px;max-height: 700px;overflow: auto">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 更新工作阶段</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">工作名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "   style="background-color: white" readonly id="titles" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">工作类型</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "   style="background-color: white" readonly id="types" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">开始时间</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  readonly  id="start_dates" style="background-color: white" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">结束时间</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  readonly  id="end_dates" style="background-color: white" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">完成阶段：</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th style="width: 4%"></th>
                                                <th class="text-center">完成阶段</th>
                                                <th class="text-center">创建时间</th>
                                            </tr>
                                            </thead>
                                            <tbody id="adds_ok">

                                            </tbody>
                                        </table>
                                        <button id="set_ok" class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-check">设置完成</i>
                                        </button>

                                        <button id="clears" style="float: right" class="btn btn-outline btn-danger dim " type="button"><i class="glyphicon glyphicon-remove"> 取消</i>
                                        </button>

                                        <button  id="adds" style="float: right" class="btn btn-outline btn-success dim" type="button"><i class="glyphicon glyphicon-plus"> 添加</i>
                                        </button>

                                        <button id="oks" style="float: right" class="btn btn-outline btn-success dim " type="button"><i class="glyphicon glyphicon-plus" > 保存</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- 注脚 -->
                        <div class="modal-footer">
                            <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                        </div>
                    </div>
                </div>
            </div>


            <!--list-->
            <div class="modal" tabindex="-1"  id="myModalss" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content" style="width: 750px; ">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 详情</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="max-height: 500px;overflow: auto">
                            <table class="table table-hover table-bordered text-center">
                                <tr>
                                    <th colspan="5" align="left"> 详情</th>
                                </tr>
                                <tr>
                                    <td width="15%">工作名称：</td>
                                    <td width="80%"  id="list-title"></td>
                                </tr>
                                <tr>
                                    <td>业务类型：</td>
                                    <td id="list-type"></td>
                                </tr>
                                <tr>
                                    <td>完成阶段：</td>
                                    <td id="list-stage"></td>
                                </tr>
                                <tr>
                                    <td>状态：</td>
                                    <td id="list-state"></td>
                                </tr>
                                <tr>
                                    <td>实行人：</td>
                                    <td id="list-staff_name"></td>
                                </tr>
                                <tr>
                                    <td>发起人：</td>
                                    <td id="list-allo_name"></td>
                                </tr>
                                <tr>
                                    <td>开始时间：</td>
                                    <td id="list-start_time"></td>
                                </tr>
                                <tr>
                                    <td>结束时间：</td>
                                    <td id="list-end_date"></td>
                                </tr>
                                <tr>
                                    <td>创建时间：</td>
                                    <td id="list-create_time"></td>
                                </tr>
                            </table>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">完成阶段：</label>
                                <div class="col-sm-10">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 4%"></th>
                                            <th class="text-center">完成阶段</th>
                                            <th class="text-center">创建时间</th>
                                        </tr>
                                        </thead>
                                        <tbody id="list-add_ok">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> 新增</a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="edit"> <span class="glyphicon glyphicon-pencil"></span> 更新阶段</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a  id="delete"> <span class="glyphicon glyphicon-trash"></span>  作废</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
                        <th class="sorting_asc_disabled" tabindex="0" aria-controls="DataTables_Table_0"  style="width: 30px;">
                            <div class="text-center">
                                <input type="checkbox" disabled >
                            </div>

                        </th>
                        <th class="sorting_asc_disabled text-center" tabindex="0" >工作名称</th>
                        <th class="sorting_asc_disabled text-center"  >业务类型</th>
                        <th class="sorting_asc_disabled text-center"  >完成阶段</th>
                        <th class="sorting_asc_disabled text-center"  >状态</th>
                        <th class="sorting_asc_disabled text-center"  >实行人</th>
                        <th class="sorting_asc_disabled text-center"  >发起人</th>
                        <th class="sorting_asc_disabled text-center"  >开始时间</th>
                        <th class="sorting_asc_disabled text-center"  >结束时间</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>
                        <th class="sorting_asc_disabled text-center"  >详情</th>
                    </thead>
                    <tbody id="ok-create">
                   <?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="gradeA odd <?php echo e($value->id); ?>  select-remove">
                        <td class="sorting_1">
                            <div class="text-center">
                                <input type="checkbox" name="check[]"  yang="yang"  value="<?php echo e($value->id); ?>">
                            </div>
                        </td>
                        <td class="text-center  "><?php echo e($value->title); ?></td>
                        <td class="text-center"><?php echo e($value->type); ?></td>
                        <td class="text-center "><?php echo e($value->stage); ?></td>
                        <td class="text-center"><?php echo e($value->state); ?></td>
                        <td class="text-center "><?php echo e($value->staff_name); ?></td>
                        <td class="text-center"><?php echo e($value->allo_name); ?></td>
                        <td class="text-center "><?php echo e($value->start_date); ?></td>
                        <td class="text-center"><?php echo e($value->end_date); ?></td>
                        <td class="text-center"><?php echo e($value->created_at); ?></td>
                        <td class="text-center">
                            <a class="details"   details_id="<?php echo e($value->id); ?>"><i class="fa fa-file-text-o"></i>  </a>
                        </td>
                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">
                            <?php echo e($work->links()); ?>

                        </div>
                    </div>

                </div>
            </div>
<?php $__env->startSection('customs-js'); ?>
      <script src="../js/work.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.footers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
