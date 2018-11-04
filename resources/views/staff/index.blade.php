@include('layouts.headers')
<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>员工档案 </h5>
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
                <div class="modal-dialog" style="width: 900px; ">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <form  id="reg">
                        <!-- 头部 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 新建档案</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body" style="overflow: auto; height: 600px;">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">姓名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control "  placeholder="请输入姓名" name="name" id="name" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">性别</label>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="男" name="gender"  checked  >
                                        <label for="inlineRadio1">男</label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="女" name="gender">
                                        <label for="inlineRadio2"> 女</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">工号</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " placeholder="请输入工号" name="number" id="number" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">职位</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " id="post" name="post">
                                            <option value=""></option>
                                           @foreach($post as $key=>$value)
                                            <option  value="{{$value->name}}" >{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">身份证</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " placeholder="请输入身份证" name="id_card" id="id_card" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">员工类型</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " id="type" name="type" >
                                            <option value=""></option>
                                            <option  value="正式员工" >正式员工</option>
                                            <option  value="临时员工" >临时员工</option>
                                            <option  value="合同员工" >合同员工</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">移动电话</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " placeholder="请输入身份证" name="tel" id="tel" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">婚姻状况</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " name="marital_status" id="marital_status" >
                                            <option value=""></option>
                                            <option  value="未婚" >未婚</option>
                                            <option  value="已婚" >已婚</option>
                                            <option  value="离异" >离异</option>
                                            <option  value="丧偶" >丧偶</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">民族</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="nation"  name="nation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">入职时间：</label>
                                    <div class="col-sm-10">
                                        <input  id="zaizhi_date"  class="form-control layer-date form-control" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"   name="entry_date" >
                                        <label class="laydate-icon"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">离职时间：</label>
                                    <div class="col-sm-10">
                                        <input  id="dimission-date"  class="form-control layer-date form-control" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"   name="dimission_date" >
                                        <label class="laydate-icon"></label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">学历</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " id="education" name="education" >
                                            <option value=""></option>
                                            <option  value="中专" >中专</option>
                                            <option  value="大专" >大专</option>
                                            <option  value="本科" >本科</option>
                                            <option  value="硕士" >硕士</option>
                                            <option  value="博士" >博士</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">入职状态</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " id="entry_status"  name="entry_status">
                                            <option value=""></option>
                                            <option  value="在职" >在职</option>
                                            <option  value="离职" >离职</option>
                                            <option  value="调休" >调休</option>
                                            <option  value="退休" >退休</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">专业</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="specialty" name="specialty" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">政治面貌</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " id="politics_statu"  name="politics_statu">
                                            <option  value="" ></option>
                                            <option  value="群众" >群众</option>
                                            <option  value="团员" >团员</option>
                                            <option  value="党员" >党员</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">健康状态</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="health" name="health" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">户口类型</label>
                                    <div class="col-sm-10">
                                        <select class=" form-control " id="registered"  name="registered">
                                            <option value=""></option>
                                            <option  value="本地城市户口" >本地城市户口</option>
                                            <option  value="本地农村户口" >本地农村户口</option>
                                            <option  value="外地户口" >外地户口</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">户口所在地</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="registered_address"  name="registered_address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">毕业时间：</label>
                                    <div class="col-sm-10">
                                        <input  id="graduate_date"  name="graduate_date"  class="form-control layer-date form-control" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"   >
                                        <label class="laydate-icon"></label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">毕业学校</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="graduate_college" name="graduate_college"   >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">个人简介</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="intro" id="intro" style="height: 200px;" placeholder="255字内简单介绍一下自己！"></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">详情</label>
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
                        </form>
                    </div>
                </div>
            </div>


            <!--edit-->
            <div class="modal" tabindex="-1"  id="myModals" data-backdrop="static" >
                <div class="modal-dialog" style="width: 900px; ">
                    <!-- 内容声明 -->
                    <div class="modal-content">
                        <form  id="regs">
                            <input type="hidden" id="check_id" >
                            <!-- 头部 -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                                <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 新建档案</span>  </h4>
                            </div>
                            <!-- 主体 -->
                            <div class="modal-body" style="overflow: auto; height: 600px;">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">姓名</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control "  placeholder="请输入姓名" name="names" id="names" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">性别</label>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio1s" value="男" name="genders"  checked  >
                                            <label for="inlineRadio1">男</label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio2s" value="女" name="genders">
                                            <label for="inlineRadio2"> 女</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">工号</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " placeholder="请输入工号" name="numbers" id="numbers" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">职位</label>
                                        <div class="col-sm-10">
                                            <select class=" form-control " id="posts" name="posts">
                                                <option value=""></option>
                                                @foreach($post as $key=>$value)
                                                    <option  value="{{$value->name}}" >{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">身份证</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " placeholder="请输入身份证" name="id_cards" id="id_cards" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">员工类型</label>
                                        <div class="col-sm-10">
                                            <select class=" form-control " id="types" name="types" >
                                                <option value=""></option>
                                                <option  value="正式员工" >正式员工</option>
                                                <option  value="临时员工" >临时员工</option>
                                                <option  value="合同员工" >合同员工</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">移动电话</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " placeholder="请输入身份证" name="tels" id="tels" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">婚姻状况</label>
                                        <div class="col-sm-10">
                                            <select class=" form-control " name="marital_statuss" id="marital_statuss" >
                                                <option value=""></option>
                                                <option  value="未婚" >未婚</option>
                                                <option  value="已婚" >已婚</option>
                                                <option  value="离异" >离异</option>
                                                <option  value="丧偶" >丧偶</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">民族</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " id="nations"  name="nations">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">入职时间：</label>
                                        <div class="col-sm-10">
                                            <input  id="zaizhi_dates"  class="form-control layer-date form-control" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"   name="entry_dates" >
                                            <label class="laydate-icon"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">离职时间：</label>
                                        <div class="col-sm-10">
                                            <input  id="dimission-dates"  class="form-control layer-date form-control" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"   name="dimission_dates" >
                                            <label class="laydate-icon"></label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">学历</label>
                                        <div class="col-sm-10">
                                            <select class=" form-control " id="educations" name="educations" >
                                                <option value=""></option>
                                                <option  value="中专" >中专</option>
                                                <option  value="大专" >大专</option>
                                                <option  value="本科" >本科</option>
                                                <option  value="硕士" >硕士</option>
                                                <option  value="博士" >博士</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">入职状态</label>
                                        <div class="col-sm-10">
                                            <select class=" form-control " id="entry_statuss"  name="entry_statuss">
                                                <option value=""></option>
                                                <option  value="在职" >在职</option>
                                                <option  value="离职" >离职</option>
                                                <option  value="调休" >调休</option>
                                                <option  value="退休" >退休</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">专业</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " id="specialtys" name="specialtys" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">政治面貌</label>
                                        <div class="col-sm-10">
                                            <select class=" form-control " id="politics_status"  name="politics_status">
                                                <option  value="" ></option>
                                                <option  value="群众" >群众</option>
                                                <option  value="团员" >团员</option>
                                                <option  value="党员" >党员</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">健康状态</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " id="healths" name="healths" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">户口类型</label>
                                        <div class="col-sm-10">
                                            <select class=" form-control " id="registereds"  name="registereds">
                                                <option value=""></option>
                                                <option  value="本地城市户口" >本地城市户口</option>
                                                <option  value="本地农村户口" >本地农村户口</option>
                                                <option  value="外地户口" >外地户口</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">户口所在地</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " id="registered_addresss"  name="registered_addresss">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">毕业时间：</label>
                                        <div class="col-sm-10">
                                            <input  id="graduate_dates"  name="graduate_dates"  class="form-control layer-date form-control" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"   >
                                            <label class="laydate-icon"></label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">毕业学校</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " id="graduate_colleges" name="graduate_colleges"   >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">个人简介</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="intros" id="intros" style="height: 200px;" placeholder="255字内简单介绍一下自己！"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">详情</label>
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
                        </form>
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
                            <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"> 员工档案详情</span>  </h4>
                        </div>
                        <!-- 主体 -->
                        <div class="modal-body">
                            <table class="table table-hover table-bordered text-center">
                                <tr>
                                    <th colspan="5" align="left"> 员工档案详情</th>
                                </tr>
                                <tr>
                                    <td width="15%">姓名：</td>
                                    <td width="80%"  id="details_name"></td>
                                </tr>
                                <tr>
                                    <td>性别：</td>
                                    <td id="details_gender"></td>
                                </tr>
                                <tr>
                                    <td>工号：</td>
                                    <td id="details_number"></td>
                                </tr>
                                <tr>
                                    <td>职位：</td>
                                    <td id="details_post"></td>
                                </tr>
                                <tr>
                                    <td>关联账号：</td>
                                    <td id="details_accounts"></td>
                                </tr>
                                <tr>
                                    <td>状态：</td>
                                    <td id="details_state"></td>
                                </tr>
                                <tr>
                                    <td>个人简介：</td>
                                    <td id="details_intro"></td>
                                </tr>
                                <tr>
                                    <td>详情：</td>
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
                            <a  href="" class="btn btn-warning  btn-sm "><i clas s="glyphicon glyphicon-refresh"></i>  重置 / 刷新</a>
                            <p></p>

                            <!--bootstrap-->

                            <div role="form" class=" form-group-sm"  style="width: 1500px;"  >
                                <label>关键字：&nbsp;&nbsp;</label>
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="sr-only" >用户名</label>
                                    <input type="text" placeholder="暂时" id="exampleInputEmail2" class="form-control" name="name" >
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input class="form-control layer-date" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})">
                                        <span class="input-group-addon">到</span>
                                        <input class="form-control layer-date" placeholder="YYYY-MM-DD" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})">
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
                        <th class="sorting_asc_disabled text-center" tabindex="0" >工号</th>
                        <th class="sorting_asc_disabled text-center"  >姓名</th>
                        <th class="sorting_asc_disabled text-center"  >性别</th>
                        <th class="sorting_asc_disabled text-center"  >身份证</th>
                        <th class="sorting_asc_disabled text-center"  >职位</th>
                        <th class="sorting_asc_disabled text-center"  >民族</th>
                        <th class="sorting_asc_disabled text-center"  >员工类型</th>
                        <th class="sorting_asc_disabled text-center"  >移动电话</th>
                        <th class="sorting_asc_disabled text-center"  >入职状态</th>
                        <th class="sorting_asc_disabled text-center"  >入职时间</th>
                        <th class="sorting_asc_disabled text-center"  >婚姻状态</th>
                        <th class="sorting_asc_disabled text-center"  >学历</th>
                        <th class="sorting_asc_disabled text-center"  >详情</th>

                    </thead>
                    <tbody id="ok-create">
                    @foreach($staff as $key=>$value)
                        <tr class="gradeA odd {{$value->id}}}  select-remove">
                            <td class="sorting_1">
                                <div class="text-center">
                                    <input type="checkbox" name="check[]"  yang="yang"  value="{{$value->id}}}" >
                                </div>
                            </td>
                            <td class="text-center  ">{{$value->number}}</td>
                            <td class="text-center">{{$value->name}}</td>
                            <td class="text-center ">{{$value->gender}}</td>
                            <td class="text-center">{{$value->id_card}}</td>
                            <td class="text-center ">{{$value->post}}</td>
                            <td class="text-center">{{$value->nation}}</td>
                            <td class="text-center ">{{$value->type}}</td>
                            <td class="text-center">{{$value->tel}}</td>
                            <td class="text-center ">{{$value->entry_status}}</td>
                            <td class="text-center">{{$value->entry_date}}</td>
                            <td class="text-center ">{{$value->marital_status}}</td>
                            <td class="text-center">{{$value->education}}</td>
                            <td class="text-center">
                                <a class="details"   details_id="{{$value->id}}}"><i class="fa fa-file-text-o"></i>  </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-right" id="page">
                            {{$staff->links()}}
                        </div>
                    </div>

                </div>

            </div>
@section('customs-js')
      <script src="../js/staff.js"></script>
@endsection
 @include('layouts.footers')