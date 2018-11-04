@include('layouts.header')
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span><img alt="image" class="img-circle" src="home/img/profile_small.jpg" /></span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">{{\Auth::user()->name}} ( {{\Auth::user()->Staff->name}} )</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
                            </li>
                            <li><a class="J_menuItem" href="profile.html">个人资料</a>
                            </li>
                            <li><a class="J_menuItem" href="contacts.html">联系我们</a>
                            </li>
                            <li><a class="J_menuItem" href="mailbox.html">信箱</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout">安全退出</a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">H+
                    </div>
                </li>


                @if(\Auth::user()->can('Index index')||
                    \Auth::user()->can('Work index') ||
                    \Auth::user()->can('Allo index') ||
                    \Auth::user()->can('Inform index')||
                    \Auth::user()->can('Letter index')
                    )
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        <span class="nav-label">办公管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">

                        @can('Index index')
                            <li>
                                <a class="J_menuItem" href="index" data-index="0"><i class="fa fa-home">首页</i></a>
                            </li>
                         @endcan
                        @can('Work index')
                            <li>
                                <a class="J_menuItem" href="work"><i class="fa fa-home">工作计划</i></a>
                            </li>
                        @endcan
                        @can('Allo index')
                            <li>
                                <a class="J_menuItem" href="allo"><i class="fa fa-home">分配任务</i></a>
                            </li>
                        @endcan
                        @can('Inform index')
                            <li>
                                <a class="J_menuItem" href="inform"><i class="fa fa-home">通知管理</i></a>
                            </li>
                        @endcan
                        @can('Letter index')
                            <li>
                                <a class="J_menuItem" href="letter"><i class="fa fa-home">私信收发</i></a>
                            </li>
                        @endcan
                    </ul>
                </li>
                @endif
                <!--2-->
                @if(\Auth::user()->can('Client index')||
                    \Auth::user()->can('Documentary index')||
                    \Auth::user()->can('Order index')
                )
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-user"></i>
                        <span class="nav-label">客户管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @can('Client index')
                        <li>
                            <a class="J_menuItem" href="client"><i class="fa fa-home">客户信息</i></a>
                        </li>
                        @endcan
                        @can('Documentary index')
                        <li>
                            <a class="J_menuItem" href="documentary"><i class="fa fa-home">跟单记录</i></a>
                        </li>
                        @endcan
                        @can('Order index')
                        <li>
                            <a class="J_menuItem" href="order"><i class="fa fa-home">销售订单</i></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endif
                <!--3-->
                @if(\Auth::user()->can('Product index')||
                    \Auth::user()->can('Inlib index')||
                    \Auth::user()->can('Outlib index')||
                    \Auth::user()->can('Alarm index')||
                    \Auth::user()->can('Procure index')
                )
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">仓库管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @can('Product index')
                        <li>
                            <a class="J_menuItem" href="product"><i class="fa fa-home">产品信息</i></a>
                        </li>
                        @endcan
                        @can('Inlib index')
                        <li>
                            <a class="J_menuItem" href="inlib" ><i class="fa fa-home">入库记录</i></a>
                        </li>
                        @endcan
                        @can('Outlib index')
                        <li>
                            <a class="J_menuItem" href="outlib"><i class="fa fa-home">出库记录</i></a>
                        </li>
                        @endcan
                        @can('Alarm index')
                        <li>
                            <a class="J_menuItem" href="alarm"><i class="fa fa-home">库存警报</i></a>
                        </li>
                        @endcan
                        @can('Procure index')
                        <li>
                            <a class="J_menuItem" href="procure"><i class="fa fa-home">采购记录</i></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endif
                <!--4-->
                @if(\Auth::user()->can('Receipt index')||\Auth::user()->can('Payment index'))
                <li>
                    <a href="#">
                        <i class="fa fa-usd"></i>
                        <span class="nav-label">财务管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @can('Receipt index')
                        <li>
                            <a class="J_menuItem" href="receipt"><i class="fa fa-home">收款记录</i></a>
                        </li>
                        @endcan
                        @can('Payment index')
                        <li>
                            <a class="J_menuItem" href="payment"><i class="fa fa-home">支出记录</i></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endif
                <!--5-->
                @if(\Auth::user()->can('User index') || \Auth::user()->can('Staff index')||\Auth::user()->can('Post index'))
                <li>
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="nav-label">人事管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @can('User index')
                        <li>
                            <a class="J_menuItem" href="user"><i class="fa fa-home">登录账号</i></a>
                        </li>
                        @endcan
                        @can('Staff index')
                        <li>
                            <a class="J_menuItem" href="staff"><i class="fa fa-home">员工档案</i></a>
                        </li>
                        @endcan
                        @can('Post index')
                        <li>
                            <a class="J_menuItem" href="post"><i class="fa fa-home">职位部门</i></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                <!--6-->
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart"></i>
                        <span class="nav-label">数据统计</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="index_v2.html"><i class="fa fa-home">产品销量</i></a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="index_v3.html"><i class="fa fa-home">人员分布</i></a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="index_v3.html"><i class="fa fa-home">客户分析</i></a>
                        </li>

                    </ul>
                </li>

                <!--7-->

                @if(\Auth::user()->can('Permission index')||\Auth::user()->can('User_Role')||\Auth::user()->can('Role_Permission'))
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-lock"></i>
                        <span class="nav-label">权限管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @can('Permission index')
                        <li>
                            <a class="J_menuItem" href="permission"><i class="fa fa-home">规则管理</i></a>
                        </li>
                        @endcan
                        @can('User_Role')
                        <li>
                            <a class="J_menuItem" href="role"><i class="fa fa-home">角色管理</i></a>
                        </li>
                        @endcan
                        @can('Role_Permission')
                        <li>
                            <a class="J_menuItem" href="role_permission"><i class="fa fa-home">角色分配规则</i></a>
                        </li>
                        @endcan
                        @can('User_Role')
                        <li>
                            <a class="J_menuItem" href="user_role"><i class="fa fa-home">用户分配角色</i></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                    @endif




            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown hidden-xs">
                        <a class="right-sidebar-toggle" aria-expanded="false">
                            <i class="fa fa-tasks"></i> 主题
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="index">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                </button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a href="/logout" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="index" frameborder="0" data-id="index" seamless></iframe>
        </div>
        <div class="footer">
            <div class="pull-right">&copy; 2014-2017 <a href="#" target="_blank">Yang-CRM</a>
            </div>
        </div>
    </div>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <div id="right-sidebar">
        <div class="sidebar-container">

            <ul class="nav nav-tabs navs-3">
                <li class="active">
                    <a data-toggle="tab" href="#tab-1">
                        <i class="fa fa-gear"></i> 主题
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="sidebar-title">
                        <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                        <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                    </div>
                    <div class="skin-setttings">
                        <div class="title">主题设置</div>
                        <div class="setings-item">
                            <span>收起左侧菜单</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                    <label class="onoffswitch-label" for="collapsemenu">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>固定顶部</span>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                    <label class="onoffswitch-label" for="fixednavbar">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                    <label class="onoffswitch-label" for="boxedlayout">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="title">皮肤选择</div>
                        <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                        </div>
                        <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                        </div>
                        <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--右侧边栏结束-->
</div>

 @include('layouts.footer')
