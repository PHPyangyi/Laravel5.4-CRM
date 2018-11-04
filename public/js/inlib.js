$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //美观验证
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function (element) {
            element.closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            if (element.is(":radio") || element.is(":checkbox")) {
                error.appendTo(element.parent().parent().parent());
            } else {
                error.appendTo(element.parent());
            }
        },
        errorClass: "help-block m-b-none",
        validClass: "help-block m-b-none"
    });


    //产品信息
    //select
    var counts=Math.ceil($("#pages").attr('count')/10);
    for (var i = 1; i <= counts; i++){
        $('#jump').append(' <option value="'+i+'">'+i+'</option>')
    }

    //查看产品信息
    $("#test").click(function () {
        $.ajax({
            url:'inlib/get_product',
            type:'POST',
            beforeSend:function(){
                $('#ok').modal('show');
                $("#myModal").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');
                $("#add-oks").children().remove();
                for (var i = 0; i < r.length; i++){
                    $('#add-oks').append(' <tr>\n' +
                        '                                        <td product_id="'+r[i]['id']+'">'+parseInt(i+1)+'</td>\n' +
                        '                                        <td>'+r[i]['sn']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['unit']+'</td>\n' +
                        '                                        <td>'+r[i]['type']+'</td>\n' +
                        '                                        <td>'+r[i]['pro_price']+'</td>\n' +
                        '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>\n');
                }
                setTimeout(function () {
                    $("#select_product").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }

        })
    });

    //下一页
    $("#next").click(function () {
        var count=Math.ceil($("#pages").attr('count')/10);
        var i =parseInt($(this).attr('next'));
        var j=i+1;
        $("#prve").parent().removeClass('disabled');
        if (i < count){
            $(this).attr('next',j);
            $("#prve").attr('prev',j);
            $.ajax({
                url:'inlib/get_product',
                type:'POST',
                data:{
                    id:j
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $("#select_product").modal('hide');
                },
                success:function (r,x,s) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据交互成功!');
                    $("#add-oks").children().remove();
                    for (var i = 0; i < r.length; i++){
                        $('#add-oks').append(' <tr>\n' +
                            '                                       <td  product_id="'+r[i]['id']+'" >'+ parseInt((i+1)+(j-1)*10) +'</td>\n' +
                            '                                        <td>'+r[i]['sn']+'</td>\n' +
                            '                                        <td>'+r[i]['name']+'</td>\n' +
                            '                                        <td>'+r[i]['unit']+'</td>\n' +
                            '                                        <td>'+r[i]['type']+'</td>\n' +
                            '                                        <td>'+r[i]['pro_price']+'</td>\n' +
                            '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                            '                                    </tr>\n');
                        setTimeout(function () {
                            $("#select_product").modal('show');
                            $('#ok').modal('hide');
                            $('#ok-img').attr('src','../home/img/loading.gif');
                            $('#ok-text').html('数据交互中..,');
                        },100)
                    }
                }

            })
        } else {
            $(this).parent().addClass("disabled")
        }
    });

    //上一页
    $("#prve").click(function () {
        if ($(this).attr('prev') !='no'){
            var i =parseInt($(this).attr('prev'));
            var next=parseInt($("#next").attr('next'));
            var newNext=next-1;
            var j=i-1;
            $(this).attr('prev',j);
            $("#next").attr('next',newNext);
            if (i <= 1 ){
                $("#next").attr('next',newNext+1);
                $(this).parent().addClass('disabled')
                $(this).attr('prev','no');
            }else {
                $.ajax({
                    url:'inlib/get_product',
                    type:'POST',
                    data:{
                        id:j
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $("#select_product").modal('hide');
                    },
                    success:function (r,x,s) {
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据交互成功!');
                        $("#add-oks").children().remove()
                        for (var i = 0; i < r.length; i++){
                            $('#add-oks').append(' <tr>\n' +
                                '                                       <td  product_id="'+r[i]['id']+'" >'+ parseInt((i+1)+(j-1)*10) +'</td>\n' +
                                '                                        <td>'+r[i]['sn']+'</td>\n' +
                                '                                        <td>'+r[i]['name']+'</td>\n' +
                                '                                        <td>'+r[i]['unit']+'</td>\n' +
                                '                                        <td>'+r[i]['type']+'</td>\n' +
                                '                                        <td>'+r[i]['pro_price']+'</td>\n' +
                                '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                                '                                    </tr>\n');
                            setTimeout(function () {
                                $("#select_product").modal('show');
                                $('#ok').modal('hide');
                                $('#ok-img').attr('src','../home/img/loading.gif');
                                $('#ok-text').html('数据交互中..,');
                            },100)
                        }
                    }

                })
            }
        }
    });


    //跳转
    $("#jumps").click(function () {
        $.ajax({
            url:'inlib/get_product',
            type:'POST',
            data:{
                id:$("#jump option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_product").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');

                $('#next').attr('next',$("#jump option:selected").val());
                $('#prve').attr('prev',$("#jump option:selected").val());
                $("#next").parent().attr('class','');
                $("#prve").parent().attr('class','');
                $("#add-oks").children().remove()
                for (var i = 0; i < r.length; i++){
                    $('#add-oks').append(' <tr>\n' +
                        '                                      <td  product_id="'+r[i]['id']+'" >'+ parseInt((i+1)+($("#jump option:selected").val()-1)*10)+'</td>\n' +
                        '                                        <td>'+r[i]['sn']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['unit']+'</td>\n' +
                        '                                        <td>'+r[i]['type']+'</td>\n' +
                        '                                        <td>'+r[i]['pro_price']+'</td>\n' +
                        '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>\n');
                }
                setTimeout(function () {
                    $("#select_product").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }
        })
    });
    //选择
    $("#add-oks").on('click','.documentary',function () {
        $("#product_name").attr('product_sn',$(this).parents(":eq(0)").children(":eq(1)").html());
        $("#product_name").attr('product_type',$(this).parents(":eq(0)").children(":eq(4)").html());
        $("#product_name").attr('product_pro_price',$(this).parents(":eq(0)").children(":eq(5)").html());
        $("#product_name").val($(this).parents(":eq(0)").children(":eq(2)").html());
        $("#product_name").attr('product_id',$(this).parents(":eq(0)").children(":eq(0)").attr('product_id'))
        $("#select_product").modal('hide');
        $("#myModal").modal('show');
    });


    //经办人
    var countss=Math.ceil($("#pagess").attr('count')/10);
    for (var i = 1; i <= countss; i++){
        $('#jumpss').append(' <option value="'+i+'">'+i+'</option>')
    }

    //查看档案
    $("#tests").click(function () {
        $.ajax({
            url:'inlib/get_staff',
            type:'POST',
            beforeSend:function(){
                $('#ok').modal('show');
                $("#myModal").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');
                $("#add-ok").children().remove();
                for (var i = 0; i < r.length; i++){
                    $('#add-ok').append('  <tr>\n' +
                        '                                        <td  staff_id="'+r[i]['id']+'" >'+parseInt(i+1)+'</td>\n' +
                        '                                        <td>'+r[i]['number']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['gender']+'</td>\n' +
                        '                                        <td>'+r[i]['id_card']+'</td>\n' +
                        '                                        <td>'+r[i]['post']+'</td>\n' +
                        '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_staff").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }

        })
    });
    //下一页
    $("#nexts").click(function () {
        var count=Math.ceil($("#pagess").attr('count')/10);
        var i =parseInt($(this).attr('nexts'));
        var j=i+1;
        $("#prves").parent().removeClass('disabled');
        if (i < count){
            $(this).attr('nexts',j);
            $("#prves").attr('prevs',j);
            $.ajax({
                url:'inlib/get_staff',
                type:'POST',
                data:{
                    id:j
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $("#select_staff").modal('hide');
                },
                success:function (r,x,s) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据交互成功!');
                    $("#add-ok").children().remove();
                    for (var i = 0; i < r.length; i++){
                        $('#add-ok').append('  <tr>\n' +
                            '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+(j-1)*10) +'</td>\n' +
                            '                                        <td>'+r[i]['number']+'</td>\n' +
                            '                                        <td>'+r[i]['name']+'</td>\n' +
                            '                                        <td>'+r[i]['gender']+'</td>\n' +
                            '                                        <td>'+r[i]['id_card']+'</td>\n' +
                            '                                        <td>'+r[i]['post']+'</td>\n' +
                            '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                            '                                    </tr>')
                        setTimeout(function () {
                            $("#select_staff").modal('show');
                            $('#ok').modal('hide');
                            $('#ok-img').attr('src','../home/img/loading.gif');
                            $('#ok-text').html('数据交互中..,');
                        },100)
                    }
                }

            })
        } else {
            $(this).parent().addClass("disabled")
        }
    });

    //上一页
    $("#prves").click(function () {
        if ($(this).attr('prevs') !='no'){
            var i =parseInt($(this).attr('prevs'));
            var next=parseInt($("#nexts").attr('nexts'));
            var newNext=next-1;
            var j=i-1;
            $(this).attr('prevs',j);
            $("#nexts").attr('nexts',newNext);
            if (i <= 1 ){
                $("#nexts").attr('nexts',newNext+1);
                $(this).parent().addClass('disabled')
                $(this).attr('prevs','no');
            }else {
                $.ajax({
                    url:'inlib/get_staff',
                    type:'POST',
                    data:{
                        id:j
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $("#select_staff").modal('hide');
                    },
                    success:function (r,x,s) {
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据交互成功!');
                        $("#add-ok").children().remove()
                        for (var i = 0; i < r.length; i++){
                            $('#add-ok').append('  <tr>\n' +
                                '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+(j-1)*10) +'</td>\n' +
                                '                                        <td>'+r[i]['number']+'</td>\n' +
                                '                                        <td>'+r[i]['name']+'</td>\n' +
                                '                                        <td>'+r[i]['gender']+'</td>\n' +
                                '                                        <td>'+r[i]['id_card']+'</td>\n' +
                                '                                        <td>'+r[i]['post']+'</td>\n' +
                                '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                                '                                    </tr>')
                            setTimeout(function () {
                                $("#select_staff").modal('show');
                                $('#ok').modal('hide');
                                $('#ok-img').attr('src','../home/img/loading.gif');
                                $('#ok-text').html('数据交互中..,');
                            },100)
                        }
                    }

                })
            }
        }
    });

    //跳转
    $("#jumpsss").click(function () {
        $.ajax({
            url:'inlib/get_staff',
            type:'POST',
            data:{
                id:$("#jumpss option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_staff").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');

                $('#nexts').attr('nexts',$("#jumpss option:selected").val());
                $('#prves').attr('prevs',$("#jumpss option:selected").val());
                $("#nexts").parent().attr('class','');
                $("#prves").parent().attr('class','');
                $("#add-ok").children().remove()
                for (var i = 0; i < r.length; i++){
                    $('#add-ok').append('  <tr>\n' +
                        '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+($("#jumpss option:selected").val()-1)*10)+'</td>\n' +
                        '                                        <td>'+r[i]['number']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['gender']+'</td>\n' +
                        '                                        <td>'+r[i]['id_card']+'</td>\n' +
                        '                                        <td>'+r[i]['post']+'</td>\n' +
                        '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_staff").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }
        })
    });
    //选择
    $("#add-ok").on('click','.documentary',function () {
        $("#staff_name").val($(this).parents(":eq(0)").children(":eq(2)").html());
        $("#staff_name").attr('staff_id',$(this).parents(":eq(0)").children(":eq(0)").attr('staff_id'))
        $("#select_staff").modal('hide');
        $("#myModal").modal('show');
    });


    //add
    var validator= $("#reg").validate({
        rules:{
            product_name:{
                required:true
            },
            number:{
                required:true,
                number:true
            },
            staff_name:{
                required:true
            },
            mode_explain:{
                required:true,
                maxlength:150,
            },
            mode:{
                required:true
            }
        },
        messages:{
            mode_explain:{
                max:'说明不得大于150位!'
            },
        },
        submitHandler:function(form) {
            $('#submit').unbind('click').bind('click',function(){
                $.ajax({
                    url:'inlib',
                    type:'POST',
                    data:{
                        'product_id':$("#product_name").attr('product_id'),
                        'number':$("#number").val(),
                        'staff_name':$("#staff_name").val(),
                        'staff_id':$("#staff_name").attr('staff_id'),
                        'mode':$("#mode option:selected").val(),
                        'mode_explain':$("#mode_explain").val()
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $('#myModal').modal('hide');
                    },
                    success:function (r,s,x) {
                        if (r['id'] > 0) {
                            $('#ok-img').attr('src','../home/img/jump_success.png');
                            $('#ok-text').html('数据修改成功');
                            $("#ok-create").prepend('<tr class="gradeA odd '+r['id']+' select-remove">\n' +
                                '                        <td class="text-center">'+$('#product_name').attr('product_sn')+'</td>\n' +
                                '                        <td class="text-center">'+$("#product_name").val()+'</td>\n' +
                                '                        <td class="text-center">'+$("#product_name").attr('product_type')+'</td>\n' +
                                '                        <td class="text-center">'+$('#product_name').attr('product_pro_price')+'</td>\n' +
                                '                        <td class="text-center">'+$('#number').val()+'</td>\n' +
                                '                        <td class="text-center">'+$('#staff_name').val()+'</td>\n' +
                                '                        <td class="text-center">'+$("#mode").val()+'</td>\n' +
                                '                        <td class="text-center">'+r['mode_explain']+'</td>\n' +
                                '                        <td class="text-center">'+r['enter']+'</td>\n' +
                                '                        <td class="text-center">'+r['created_at']+'</td>\n' +
                                '\n' +
                                '                        <td class="text-center">\n' +
                                '                            <a class="details"   details_id="'+r['id']+'"><i class="fa fa-file-text-o"></i>  </a>\n' +
                                '                        </td>\n' +
                                '                    </tr>');

                            if ($("#ok-create").children().length>10){
                                $("#ok-create").children(":eq(10)").remove();
                            }
                            setTimeout(function () {
                                $("#product_name").val('');
                                $("#staff_name").val('');
                                $("#number").val("");
                                $("#mode_explain").val("");
                                $("#mode").val("");
                                $('#ok').modal('hide');
                                $('#ok-img').attr('src','../home/img/loading.gif');
                                $('#ok-text').html('数据交互中..,');
                            },1000)
                        }else {
                            $('#ok-img').attr('src','../home/img/jump_error.png');
                            $('#ok-text').html('数据修改失败,数据异常...');
                            setTimeout(function () {
                                $('#ok').modal('hide');
                                $('#ok-img').attr('src','../home/img/loading.gif');
                                $('#ok-text').html('数据交互中..,');
                            },1000);
                        }
                    }

                });
            })
        }
    });

    //list
    $("#ok-create").on('click','.details',function () {
        var id = $(this).attr('details_id');
        $.ajax({
            type:"GET",
            url:'inlib/'+id+'/edit',
            data:{
                id:id
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (r,s,x) {
                $('#myModalss').modal('show');
                $('#ok').modal('hide');
                $("#details_name").html(r['name']);
                $("#details_sn").html(r['sn']);
                $("#details_type").html(r['type']);
                $("#details_pro_price").html(r['pro_price']);
                $("#details_number").html(r['number']);
                $("#details_staff_name").html(r['staff_name']);
                $("#details_mode").html(r['mode']);
                $("#details_mode_explain").html(r['mode_explain']);
                $("#details_enter").html(r['enter']);
                $("#details_create_time").html(r['created_at']);
                setTimeout(function () {
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                }, 1000)

            }


        });
    });


});
