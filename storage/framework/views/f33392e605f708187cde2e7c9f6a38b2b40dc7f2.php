
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Yang-CRM - 登录</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="home/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="home/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="home/css/animate.css" rel="stylesheet">
    <link href="home/css/style.css?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <h3>欢迎使用 Yang-CRM</h3>

        <form class="m-t" role="form"   method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="用户名"  name="name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="密码"  name="password">
            </div>
            <div class="form-group">
                <input type="text" class=" col-lg-7" placeholder="验证码" style="height: 35px;border: none" name="captcha">
                <div class="col-lg-5">
                    <img class="thumbnail captcha" src="<?php echo e(captcha_src('flat')); ?>" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                </div>
            </div>

            <div class="form-group text-left">
                        <label class="no-padding col-sm-2"  style="width: 100px;">
                        <input  type="checkbox" value="1" name="is_remember"> &nbsp;&nbsp;&nbsp; <span>记住我</span> </label>
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>

            <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register">注册一个新账号</a>
            </p>

        </form>
        <div id="show_error">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- 全局js -->
<script src="home/js/jquery.min.js?v=2.1.4"></script>
<script src="home/js/bootstrap.min.js?v=3.3.6"></script>


</body>

</html>
