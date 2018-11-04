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

    //select
    var counts=Math.ceil($("#pages").attr('count')/10);
    for (var i = 1; i <= counts; i++){
        $('#jump').append(' <option value="'+i+'">'+i+'</option>')
    }
    //查看档案
    $("#test").click(function () {
        $.ajax({
            url:'user/get_staff',
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
    $("#next").click(function () {
        var count=Math.ceil($("#pages").attr('count')/10);
        var i =parseInt($(this).attr('next'));
        var j=i+1;
        $("#prve").parent().removeClass('disabled');
        if (i < count){
            $(this).attr('next',j);
            $("#prve").attr('prev',j);
            $.ajax({
                url:'user/get_staff',
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
                     url:'user/get_staff',
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
    $("#jumps").click(function () {
        $.ajax({
            url:'user/get_staff',
            type:'POST',
            data:{
                id:$("#jump option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_staff").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');

                $('#next').attr('next',$("#jump option:selected").val());
                $('#prve').attr('prev',$("#jump option:selected").val());
                $("#next").parent().attr('class','');
                $("#prve").parent().attr('class','');
                $("#add-ok").children().remove()
                for (var i = 0; i < r.length; i++){
                    $('#add-ok').append('  <tr>\n' +
                        '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+($("#jump option:selected").val()-1)*10)+'</td>\n' +
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
    $("#reg").validate({
        rules:{
            name:{
                required : true,
                minlength : 2,
                maxlength:10,
                remote:{
                    url:'user/checkUnique',
                    type:'POST',
                    data:{
                        name:function(){
                            return  $("#name").val()
                        }
                    }
                }
            },
            password:{
                required : true,
                minlength : 8,
                maxlength:16,
            },
            staff_name:{
                required : true,
            }
        },
        messages:{
            name:{
                minlength : "账号长度不得小于2位",
                maxlength:10,
                remote:"此账号已存在!"

            },
            password:{
                minlength : "密码长度不得小于8位",
                maxlength:"密码长度不得大于16位",
            },
        },
        submitHandler:function(form) {
            $('#submit').unbind('click').bind('click',function(){
                    $.ajax({
                        url:'user',
                        type:'POST',
                        data:{
                            state:$('[name=state]:radio:checked').val(),
                            name:$("#name").val(),
                            password:$("#password").val(),
                            staff_name:$("#staff_name").val(),
                            staff_id:$('#staff_name').attr('staff_id'),
                        },
                        beforeSend:function(){
                             $('#myModal').modal('hide');
                              $('#ok').modal('show');

                        },
                        success:function(response,stutas,xhr) {
                            if (response['id'] > 0) {
                                $('#ok-img').attr('src','../home/img/jump_success.png');
                                $('#ok-text').html('数据添加成功');

                                $("#ok-create").prepend('<tr class="gradeA odd '+response['id']+' select-remove">\n' +
                                    '                            <td class="sorting_1">\n' +
                                    '                                <div class="text-center">\n' +
                                    '                                    <input type="checkbox" name="check[]"  yang="yang"  value="'+response['id']+'" >\n' +
                                    '                                </div>\n' +
                                    '                            </td>\n' +
                                    '                            <td class="text-center ">'+response['name']+'</td>\n' +
                                    '                            <td class="text-center">'+response['last_login_time']+'</td>\n' +
                                    '                            <td class="text-center">'+response['last_login_ip']+'</td>\n' +
                                    '                            <td class="text-center">'+response['login_count']+'</td>\n' +
                                    '                            <td class="text-center">'+response['state']+'</td>\n' +
                                    '                            <td class="text-center">'+response['created_at']+'</td>\n' +
                                    '                        </tr>');

                                if ($("#ok-create").children().length>10){
                                    $("#ok-create").children(":eq(10)").remove();
                                }
                                setTimeout(function () {
                                    $("#staff_name").val('');
                                    $("#name").val('');
                                    $('#password').val('');
                                    $('#ok').modal('hide');
                                    $('#ok-img').attr('src','../home/img/loading.gif');
                                    $('#ok-text').html('数据交互中..,');

                                }, 1000)
                            }
                        }

                    });
            });
        }
    });


    //select
    var counts_update=Math.ceil($("#pages-update").attr('count')/10);
    for (var i = 1; i <= counts_update; i++){
        $('#jump-update').append(' <option value="'+i+'">'+i+'</option>')
    }

    //查看档案
    $("#tests").click(function () {
        $.ajax({
            url:'user/get_staff',
            type:'POST',
            beforeSend:function(){
                $('#ok').modal('show');
                $("#myModals").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');
                $("#add-oks").children().remove();
                for (var i = 0; i < r.length; i++){
                    $('#add-oks').append('  <tr>\n' +
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
                    $("#select_staffs").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }

        })
    });


    //下一页
    $("#next-update").click(function () {
        var count=Math.ceil($("#pages-update").attr('count')/10);
        var i =parseInt($(this).attr('next'));
        var j=i+1;
        $("#prve-update").parent().removeClass('disabled');
        if (i < count){
            $(this).attr('next',j);
            $("#prve-update").attr('prev',j);
            $.ajax({
                url:'user/get_staff',
                type:'POST',
                data:{
                    id:j
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $("#select_staffs").modal('hide');
                },
                success:function (r,x,s) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据交互成功!');
                    $("#add-oks").children().remove();
                    for (var i = 0; i < r.length; i++){
                        $('#add-oks').append('  <tr>\n' +
                            '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+(j-1)*10) +'</td>\n' +
                            '                                        <td>'+r[i]['number']+'</td>\n' +
                            '                                        <td>'+r[i]['name']+'</td>\n' +
                            '                                        <td>'+r[i]['gender']+'</td>\n' +
                            '                                        <td>'+r[i]['id_card']+'</td>\n' +
                            '                                        <td>'+r[i]['post']+'</td>\n' +
                            '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                            '                                    </tr>')
                        setTimeout(function () {
                            $("#select_staffs").modal('show');
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
    $("#prve-update").click(function () {
        if ($(this).attr('prev') !='no'){
            var i =parseInt($(this).attr('prev'));
            var next=parseInt($("#next-update").attr('next'));
            var newNext=next-1;
            var j=i-1;
            $(this).attr('prev',j);
            $("#next-update").attr('next',newNext);
            if (i <= 1 ){
                $("#next-update").attr('next',newNext+1);
                $(this).parent().addClass('disabled')
                $(this).attr('prev','no');
            }else {
                $.ajax({
                    url:'user/get_staff',
                    type:'POST',
                    data:{
                        id:j
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $("#select_staffs").modal('hide');
                    },
                    success:function (r,x,s) {
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据交互成功!');
                        $("#add-oks").children().remove()
                        for (var i = 0; i < r.length; i++){
                            $('#add-oks').append('  <tr>\n' +
                                '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+(j-1)*10) +'</td>\n' +
                                '                                        <td>'+r[i]['number']+'</td>\n' +
                                '                                        <td>'+r[i]['name']+'</td>\n' +
                                '                                        <td>'+r[i]['gender']+'</td>\n' +
                                '                                        <td>'+r[i]['id_card']+'</td>\n' +
                                '                                        <td>'+r[i]['post']+'</td>\n' +
                                '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                                '                                    </tr>')
                            setTimeout(function () {
                                $("#select_staffs").modal('show');
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
    $("#jumps-update").click(function () {
        $.ajax({
            url:'user/get_staff',
            type:'POST',
            data:{
                id:$("#jump-update option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_staffs").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');

                $('#next-update').attr('next',$("#jump-update option:selected").val());
                $('#prve-update').attr('prev',$("#jump-update option:selected").val());
                $("#next-update").parent().attr('class','');
                $("#prve-update").parent().attr('class','');
                $("#add-oks").children().remove()
                for (var i = 0; i < r.length; i++){
                    $('#add-oks').append('  <tr>\n' +
                        '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+($("#jump-update option:selected").val()-1)*10)+'</td>\n' +
                        '                                        <td>'+r[i]['number']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['gender']+'</td>\n' +
                        '                                        <td>'+r[i]['id_card']+'</td>\n' +
                        '                                        <td>'+r[i]['post']+'</td>\n' +
                        '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_staffs").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }
        })
    });



    //选择
    $("#add-oks").on('click','.documentary',function () {
        $("#staff_names").val($(this).parents(":eq(0)").children(":eq(2)").html());
        $("#staff_names").attr('staff_id',$(this).parents(":eq(0)").children(":eq(0)").attr('staff_id'))
        $("#select_staffs").modal('hide');
        $("#myModals").modal('show');
    });


    //edit
    $('#edit').click(function(){
        if (!$("[yang=yang]:checkbox:checked").length>0 ||$("[yang=yang]:checkbox:checked").length>1 ){
            $(document).ready(function () {
                swal({
                    title: "警告",
                    text: "至少有一个被选中，且只能选中一个"
                });
            });
        }else {
            var ids =$("[yang=yang]:checkbox:checked").val();
            $.ajax({
                type: 'GET',
                url: 'user/' + ids + '/edit',
                data: {
                    id: ids
                },
                beforeSend: function () {
                    $('#ok').modal('show');
                },
                success: function (response, stutas, xhr) {
                    if (response['state']=='正常'){     //性别
                        $('#inlineRadio1s')[0].checked = true
                        $('#inlineRadio2s').removeAttr("checked");
                    } else {
                        $('#inlineRadio2s')[0].checked = true
                        $('#inlineRadio1s').removeAttr("checked");
                    }
                    $("#check_id").val(response['id']);
                    $("#names").val(response['name']);
                    $("#staff_names").val(response['staff_name']);
                    $('#myModals').modal('show');
                    setTimeout(function () {
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src', '../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    }, 1)
                }
            })
        }

        $("#regs").validate({
            rules:{
                names:{
                    required : true,
                    minlength : 2,
                    maxlength:10,
                    remote:{
                        url:'user/checkUnique',
                        type:'POST',
                        data:{
                            name:function(){
                                return  $("#names").val()
                            },
                            id:function () {
                                return $("#check_id").val();
                            }
                        }
                    }
                },
                passwords:{
                    minlength : 8,
                    maxlength:16,
                },
                staff_names:{
                    required : true,
                }
            },
            messages:{
                names:{
                    minlength : "账号长度不得小于2位",
                    maxlength:10,
                    remote:"此账号已存在!"

                },
                passwords:{
                    minlength : "密码长度不得小于8位",
                    maxlength:"密码长度不得大于16位",
                },
            },
            submitHandler:function(form) {
                $('#submits').click(function(){
                    $.ajax({
                        type:'PUT',
                        url:"user/"+ids,
                        data:{
                            name:$("#names").val(),
                            password:$("#passwords").val(),
                            state:$('[name=states]:radio:checked').val(),
                            staff_name:$("#staff_names").val(),
                            staff_id:$('#staff_names').attr('staff_id'),
                        },
                        beforeSend:function(){
                            $('#myModals').modal('hide');
                            $('#ok').modal('show');
                        },
                        success:function (response,stutas,xhr){
                            if (response=='true'){
                                $('#ok-img').attr('src','../home/img/jump_success.png');
                                $('#ok-text').html('数据修改成功');

                                $("[yang=yang]:checkbox:checked").parents(":eq(1)").next().text($('#names').val());
                                $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(4)").text($('[name=states]:radio:checked').val());
                                setTimeout(function () {
                                    $("[yang=yang]:checkbox:checked").attr('checked',false);
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
                });
            }
        });

    });

    //delete
    $("#delete").click(function(){
        if ($("[yang=yang]:checkbox:checked").length>0){
            var delete_id=[];
            var i=0;
            $.each($("[yang=yang]:checkbox:checked"),function(){
                if(this.checked){
                    delete_id[i]=$(this).val();
                    i++;
                }
            });
            var num=JSON.stringify((delete_id));
            $.ajax({
                type:'DELETE',
                url:'user/delete',
                data:{
                    ids:num,
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                },
                success:function (response,stutas,xhr) {
                    if(response=='true'){
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据删除成功');
                        $("[yang=yang]:checkbox:checked").parent().parent().parent().remove();
                        setTimeout(function () {
                            $("[yang=yang]:checkbox:checked").attr('checked',false);
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
            })
        }else {
            $(document).ready(function () {
                swal({
                    title: "警告",
                    text: "至少有一个被选中！"
                });
            });
        }
    });

});
