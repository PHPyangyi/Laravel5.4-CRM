<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*登录 and 注册*/
Route::get('/register', "\App\Http\Controllers\RegisterController@index");
Route::post('/register', "\App\Http\Controllers\RegisterController@register");

/*登录之后无法在进入登录页面*/
Route::group(['middleware' => 'checklogin'],function () {
    Route::get('/login', "\App\Http\Controllers\LoginController@index")->name('login');
});
Route::post('/login', "\App\Http\Controllers\LoginController@login");


Route::group(['middleware' => 'auth:web'], function() {  //登录之后再能进入

    //首页
    Route::get('/index', "\App\Http\Controllers\IndexController@index");
/*登录首页*/
Route::get('/', function () {
    return view('layouts/layouts');
});
//退出登录
    Route::get('/logout', "\App\Http\Controllers\LoginController@logout");

/*人事管理*/
//职位部
    Route::post('/post/checkUnique', 'PostController@checkUnique'); //验证测试是否唯一
    Route::resource('/post', 'PostController');
//员工档案
    Route::post('/staff/checkUnique', 'StaffController@checkUnique'); //验证测试是否唯一
    Route::resource('/staff', 'StaffController');
//登录账号
    Route::post('/user/get_staff', 'UserController@getStaff'); //获取员工档案 ，因为要做分页，所以分配一个路由
    Route::post('/user/checkUnique', 'UserController@checkUnique'); //验证测试是否唯一
    Route::resource('/user', 'UserController');

/*仓库管理*/
    //产品信息
    Route::post('/product/checkUnique', 'ProductController@checkUnique'); //验证测试是否唯一
    Route::resource('/product', 'ProductController');
    //入库管理
    Route::post('/inlib/get_staff', 'InlibController@getStaff'); //获取产品信息 ，因为要做分页，所以分配一个路由
    Route::post('/inlib/get_product', 'InlibController@getProduct'); //获取产品信息 ，因为要做分页，所以分配一个路由
    Route::resource('/inlib', 'InlibController');
    //库存警告
    Route::get('/alarm','AlarmController@index');
    //采购记录
    Route::get('/procure/{inlib}/details','ProcureController@details');  //采购记录的详情信息
    Route::get('/procure','ProcureController@index');
    //出库记录
    Route::post('/outlib/ok','OutlibController@ok');
    Route::get('/outlib','OutlibController@index');

/*客户管理*/
    //客户信息
    Route::resource('/client','ClientController');
    //跟单记录
    Route::post('/documentary/get_client', 'DocumentaryController@getClient'); //获取关联公司 ，因为要做分页，所以分配一个路由
    Route::post('/documentary/get_staff', 'DocumentaryController@getStaff'); //获取员工档案 ，因为要做分页，所以分配一个路由
    Route::resource('/documentary','DocumentaryController');
    //销售订单
    Route::post('/order/get_documentary', 'OrderController@getDocumentary'); //获取关联公司 ，因为要做分页，所以分配一个路由
    Route::resource('/order','OrderController');

/*财务管理*/
    Route::get('/inlib/{inlib}/details','InlibController@details');
    Route::get('/payment','PaymentController@index');
    //收款记录
    Route::post('/receipt/get_order','ReceiptController@getOrder');
    Route::post('/receipt','ReceiptController@store');
    Route::get('/receipt','ReceiptController@index');

/*工作计划*/
    //工作计划
    Route::delete('/work/delete','WorkController@delete');
    Route::post('/work/set_ok','WorkController@setOK');
    Route::post('/work/extend','WorkController@extend');
    Route::get('/work/{work}/edit','WorkController@edit');
    Route::post('/work','WorkController@store');
    Route::get('/work','WorkController@index');
    //分配工作
    Route::post('/allo','AlloController@store');
    Route::post('/allo/get_staff', 'AlloController@getStaff'); //获取员工档案 ，因为要做分页，所以分配一个路由
    Route::get('/allo','AlloController@index');
    //消息通知
    Route::resource('/inform','InformController');
    //私信收发
    Route::post('/letter/get_staff', 'LetterController@getStaff'); //获取员工档案 ，因为要做分页，所以分配一个路由
    Route::resource('/letter','LetterController');
/*权限管理*/
    Route::resource('/permission','PermissionController');
    Route::resource('/role','RoleController');

    Route::get('/role_permission/distribution/{id}','RolePermissionController@distribution');
    Route::resource('/role_permission','RolePermissionController');\

    Route::post('/user_role','UserRoleController@add');
    Route::get('/user_role/create/{id}','UserRoleController@create');
    Route::get('/user_role','UserRoleController@index');
});

//test-data
Route::put('/test/{post}','TestController@update');
Route::get('/test/{post}/edit','TestController@edit');
Route::get('/test','TestController@index');


