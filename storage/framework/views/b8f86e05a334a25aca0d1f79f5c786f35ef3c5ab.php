<?php $__env->startSection('title','Ynag-CRM 404-页面未找到！'); ?>
<?php echo $__env->make('layouts.headers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="middle-box text-center animated fadeInDown">
    <h1>404</h1>
    <h3 class="font-bold">页面未找到！</h3>

    <div class="error-desc">
        抱歉，页面好像去火星了~
        <form class="form-inline m-t" role="form">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="请输入您需要查找的内容 …">
            </div>
            <button type="submit" class="btn btn-primary">搜索</button>
        </form>
    </div>
</div>


</body>

</html>
