<?php echo $__env->make('layouts.headers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>xx <small>分类，查找</small></h5>
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
                            <a  href="role/create"><span class="glyphicon glyphicon-plus"></span> 新增</a> &nbsp;&nbsp;&nbsp;&nbsp;

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
                        <th class="sorting_asc_disabled text-center" tabindex="0" >用户名</th>
                        <th class="sorting_asc_disabled text-center" tabindex="0" >level</th>
                        <th class="sorting_asc_disabled text-center"  >分配角色</th>
                    </thead>
                    <tbody id="ok-create">
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="gradeA odd {$value.id} select-remove">
                            <td class="text-center "><?php echo e($value->name); ?></td>
                            <td class="text-center ">
                                <?php $__currentLoopData = $value->getPermissionsViaRoles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($values->name); ?> ,
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td class="text-center "><a class="btn btn-primary" href="/user_role/create/<?php echo e($value->id); ?>">添加角色</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">

                        </div>
                    </div>

                </div>


            </div>
<?php echo $__env->make('layouts.footers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
