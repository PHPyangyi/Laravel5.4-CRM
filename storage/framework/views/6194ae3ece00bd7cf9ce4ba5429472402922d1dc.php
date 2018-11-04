<?php echo $__env->make('layouts.headers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>收款记录 <small>分类，查找</small></h5>
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
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 新建收款记录</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body">
                            <div class="form-horizontal">

                                <div class="form-group">
                                    <label class="control-label">收款标题</label>
                                    <input type="text" class="form-control "  id="title" >
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">收款订单</label>
                                    <div class=" input-group">
                                        <input type="text" class="form-control "    id="order_sn"   >
                                        <div class="input-group-addon" id="test"><span class="glyphicon glyphicon-search"></span></div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label">订单报价: <span id="b"></span> </label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label">收款金额</label>
                                    <input type="text" class="form-control "  id="cost" >
                                </div>



                                <div class="form-group">
                                    <label class="control-label">收款备注</label>
                                    <input type="text" class="form-control "  placeholder="20字以内备注说明"  id="remark" >
                                </div>


                            </div>
                        </div>
                        <!-- 注脚 -->
                        <div class="modal-footer">
                            <a   class="btn btn-primary"  id="submit" > <span class="glyphicon glyphicon-ok">保存</span>  </a>
                            <a  class="btn btn-danger" style="margin-top: -5px;" data-dismiss="modal" > <span class="glyphicon glyphicon-remove">取消</span></a>
                        </div>
                    </div>
                </div>
            </div>




            <div class="modal" tabindex="-1"  id="select_order" data-backdrop="static" >
                <div class="modal-dialog">
                    <!-- 内容声明 -->
                    <div class="modal-content"  style="width: 750px;">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 选择订单</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto;max-height: 550px;" >
                            <div class="form-horizontal">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr >
                                    <tr >
                                        <th>序号</th>
                                        <th  class="text-center">订单编号</th>
                                        <th  class="text-center">订单标题</th>
                                        <th  class="text-center">订单报价</th>
                                        <th  class="text-center">选择订单</th>
                                    </tr>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="add-ok">

                                    </tbody>
                                </table>
                                <div>
                                    <ul class="pager" count="<?php echo e($order->count()); ?>" id="pages">
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




            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> 新增</a> &nbsp;&nbsp;&nbsp;&nbsp;
                             <a  href="" class="btn btn-warning  btn-sm "><i class="glyphicon glyphicon-refresh"></i>  重置 / 刷新</a>
                            <p></p>

                            <!--bootstrap-->

                            <div role="form" class=" form-group-sm"  style="width: 650px;"  >
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
                        <th class="sorting_asc_disabled text-center" tabindex="0" >收款标题</th>
                        <th class="sorting_asc_disabled text-center"  >关联订单</th>
                        <th class="sorting_asc_disabled text-center"  >收款金额</th>
                        <th class="sorting_asc_disabled text-center"  >录入员</th>
                        <th class="sorting_asc_disabled text-center"  >创建时间</th>
                    </thead>
                    <tbody id="ok-create">
                    <?php $__currentLoopData = $receipt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($value->title); ?></td>
                        <td class="text-center"><?php echo e($value->order_sn); ?></td>
                        <td class="text-center"><?php echo e($value->cost); ?></td>
                        <td class="text-center"><?php echo e($value->enter); ?></td>
                        <td class="text-center"><?php echo e($value->created_at); ?></td>
                    </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">

                        </div>
                    </div>

                </div>
            </div>
<?php $__env->startSection('customs-js'); ?>
      <script src="../js/receipt.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.footers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
