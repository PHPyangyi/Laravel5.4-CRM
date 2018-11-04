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
            url:'documentary/get_staff',
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
                url:'documentary/get_staff',
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
                    }
                    setTimeout(function () {
                        $("#select_staff").modal('show');
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },100)
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
                    url:'documentary/get_staff',
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
            url:'documentary/get_staff',
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



    //select
    var counts_client=Math.ceil($("#pages-client").attr('count')/10);
    for (var i = 1; i <= counts_client; i++){
        $('#jump-client').append(' <option value="'+i+'">'+i+'</option>')
    }
    //选择关联公司
    $("#tests").click(function () {
        $.ajax({
            url:'documentary/get_client',
            type:'POST',
            beforeSend:function(){
                $('#ok').modal('show');
                $("#myModal").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');
                $("#add-ok-client").children().remove();
                for (var i = 0; i < r.length; i++){
                    $('#add-ok-client').append('  <tr>\n' +
                        '                                      <td  client_id="'+r[i]['id']+'" >'+parseInt(i+1)+'</td>\n' +
                        '                                        <td>'+r[i]['company']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['tel']+'</td>\n' +
                        '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_client").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }

        })
    });

    //下一页
    $("#next-client").click(function () {
        var count=Math.ceil($("#pages-client").attr('count')/10);
        var i =parseInt($(this).attr('next'));
        var j=i+1;
        $("#prve-client").parent().removeClass('disabled');
        if (i < count){
            $(this).attr('next',j);
            $("#prve-client").attr('prev',j);
            $.ajax({
                url:'documentary/get_client',
                type:'POST',
                data:{
                    id:j
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $("#select_client").modal('hide');
                },
                success:function (r,x,s) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据交互成功!');
                    $("#add-ok-client").children().remove();
                    for (var i = 0; i < r.length; i++){
                        $('#add-ok-client').append('  <tr>\n' +
                            '                                      <td  client_id="'+r[i]['id']+'" >'+parseInt((i+1)+(j-1)*10)+'</td>\n' +
                            '                                        <td>'+r[i]['company']+'</td>\n' +
                            '                                        <td>'+r[i]['name']+'</td>\n' +
                            '                                        <td>'+r[i]['tel']+'</td>\n' +
                            '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                            '                                    </tr>');

                    }
                    setTimeout(function () {
                        $("#select_client").modal('show');
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },100)
                }

            })
        } else {
            $(this).parent().addClass("disabled")
        }
    });

    //上一页
    $("#prve-client").click(function () {
        if ($(this).attr('prev') !='no'){
            var i =parseInt($(this).attr('prev'));
            var next=parseInt($("#next-client").attr('next'));
            var newNext=next-1;
            var j=i-1;
            $(this).attr('prev',j);
            $("#next-client").attr('next',newNext);
            if (i <= 1 ){
                $("#next-client").attr('next',newNext+1);
                $(this).parent().addClass('disabled')
                $(this).attr('prev','no');
            }else {
                $.ajax({
                    url:'documentary/get_client',
                    type:'POST',
                    data:{
                        id:j
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $("#select_client").modal('hide');
                    },
                    success:function (r,x,s) {
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据交互成功!');
                        $("#add-ok-client").children().remove()
                        for (var i = 0; i < r.length; i++){
                            $('#add-ok-client').append('  <tr>\n' +
                                '                                      <td  client_id="'+r[i]['id']+'" >'+parseInt((i+1)+(j-1)*10)+'</td>\n' +
                                '                                        <td>'+r[i]['company']+'</td>\n' +
                                '                                        <td>'+r[i]['name']+'</td>\n' +
                                '                                        <td>'+r[i]['tel']+'</td>\n' +
                                '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                                '                                    </tr>');

                        }
                        setTimeout(function () {
                            $("#select_client").modal('show');
                            $('#ok').modal('hide');
                            $('#ok-img').attr('src','../home/img/loading.gif');
                            $('#ok-text').html('数据交互中..,');
                        },100)
                    }

                })
            }
        }
    });


    //跳转
    $("#jumps-client").click(function () {
        $.ajax({
            url:'documentary/get_client',
            type:'POST',
            data:{
                id:$("#jump-client option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_client").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');

                $('#next-client').attr('next',$("#jump-client option:selected").val());
                $('#prve-client').attr('prev',$("#jump-client option:selected").val());
                $("#next-client").parent().attr('class','');
                $("#prve-client").parent().attr('class','');
                $("#add-ok-client").children().remove()
                for (var i = 0; i < r.length; i++){
                    $('#add-ok-client').append('  <tr>\n' +
                        '                                      <td  client_id="'+r[i]['id']+'" >'+ parseInt((i+1)+($("#jump-client option:selected").val()-1)*10)+'</td>\n' +
                        '                                        <td>'+r[i]['company']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['tel']+'</td>\n' +
                        '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_client").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }
        })
    });

    //选择
    $("#add-ok-client").on('click','.documentary',function () {
        $("#client_company").val($(this).parents(":eq(0)").children(":eq(1)").html());
        $("#client_company").attr('client_id',$(this).parents(":eq(0)").children(":eq(0)").attr('client_id'))
        $("#select_client").modal('hide');
        $("#myModal").modal('show');
    });


    //add
    $("#reg").validate({
        rules:{
            title:{
                required:true,
                minlength : 2,
                maxlength:20,
            },
            client_company:{
                required:true
            },
            staff_name:{
                required:true
            },
            way:{
                required:true
            },
            evolve:{
                required:true
            },
            remark:{
                required:true,
                maxlength:20,
            }
        },
        messages:{
            title:{
                maxlength: '标题内容长度不得大于20位',
                minlength:'标题内容长度不得小于2位'
            },
            remark:{
                maxlength:'备注内容不得大于20位',
            }
        },
        submitHandler:function(form) {
            $.ajax({
                url: 'documentary',
                type: 'POST',
                data: {
                    title:$("#title").val(),
                    client_id:$("#client_company").attr('client_id'),
                    client_company:$("#client_company").val(),
                    staff_id:$("#staff_name").attr('staff_id'),
                    staff_name:$("#staff_name").val(),
                    way:$("#way option:selected").val(),
                    evolve:$("#evolve option:selected").val(),
                    remark:$("#remark").val(),
                },
                beforeSend: function () {
                    $('#myModal').modal('hide');
                    $('#ok').modal('show');
                },
                success: function (response, stutas, xhr) {
                    if (response['id']) {
                        $('#ok-create').prepend(' <tr class="gradeA odd '+ response['id'] +' select-remove">\n' +
                            '                        <td class="sorting_1">\n' +
                            '                            <div class="text-center">\n' +
                            '                                <input type="checkbox" name="check[]"  yang="yang"  value="'+ response['id'] +'" >\n' +
                            '                            </div>\n' +
                            '                        </td>\n' +
                            '                        <td class="text-center">'+ response['sn'] +'</td>\n' +
                            '                        <td class="text-center">'+ response['title'] +'</td>\n' +
                            '                        <td class="text-center">'+ $("#client_company").val() +'</td>\n' +
                            '                        <td class="text-center">'+ $("#user").val() +'</td>\n' +
                            '                        <td class="text-center">'+ $("#way option:selected").val() +'</td>\n' +
                            '                        <td class="text-center">'+ $("#evolve option:selected").val() +'</td>\n' +
                            '                        <td class="text-center">{:session("name")}</td>\n' +
                            '                        <td class="text-center">'+ $("#remark").val() +'</td>\n' +
                            '                        <td class="text-center">'+ response['created_at'] +'</td>\n' +
                            '\n' +
                            '                    </tr>');
                        if ($("#ok-create").children().length>10){
                            $("#ok-create").children(":eq(10)").remove();
                        }
                        setTimeout(function () {
                            title:$("#title").val(''),
                                $("#client_company").attr('client_id',''),
                                $("#client_company").val(''),
                                $("#staff_name").attr('staff_id',''),
                                $("#staff_name").val(''),
                                $("#remark").val(''),
                            $('#ok-img').attr('src','../home/img/jump_success.png');
                            $('#ok-text').html('数据添加成功');
                            $('#ok').modal('hide');
                            $('#ok-img').attr('src', '../home/img/loading.gif');
                            $('#ok-text').html('数据交互中..,');
                        }, 1)
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
        }
    })


    //update

    //select
    var counts_update=Math.ceil($("#pages-update").attr('count')/10);
    for (var i = 1; i <= counts_update; i++){
        $('#jump-update').append(' <option value="'+i+'">'+i+'</option>')
    }

    //查看档案
    $("#test-update").click(function () {
        $.ajax({
            url:'documentary/get_staff',
            type:'POST',
            beforeSend:function(){
                $('#ok').modal('show');
                $("#myModals").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');
                $("#add-ok-update").children().remove();
                for (var i = 0; i < r.length; i++){
                    $('#add-ok-update').append('  <tr>\n' +
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
                    $("#select_staff-update").modal('show');
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
                url:'documentary/get_staff',
                type:'POST',
                data:{
                    id:j
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $("#select_staff-update").modal('hide');
                },
                success:function (r,x,s) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据交互成功!');
                    $("#add-ok-update").children().remove();
                    for (var i = 0; i < r.length; i++){
                        $('#add-ok-update').append('  <tr>\n' +
                            '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+(j-1)*10) +'</td>\n' +
                            '                                        <td>'+r[i]['number']+'</td>\n' +
                            '                                        <td>'+r[i]['name']+'</td>\n' +
                            '                                        <td>'+r[i]['gender']+'</td>\n' +
                            '                                        <td>'+r[i]['id_card']+'</td>\n' +
                            '                                        <td>'+r[i]['post']+'</td>\n' +
                            '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                            '                                    </tr>')
                    }
                    setTimeout(function () {
                        $("#select_staff-update").modal('show');
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },100)
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
                    url:'documentary/get_staff',
                    type:'POST',
                    data:{
                        id:j
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $("#select_staff-update").modal('hide');
                    },
                    success:function (r,x,s) {
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据交互成功!');
                        $("#add-ok-update").children().remove()
                        for (var i = 0; i < r.length; i++){
                            $('#add-ok-update').append('  <tr>\n' +
                                '                                        <td  staff_id="'+r[i]['id']+'" >'+ parseInt((i+1)+(j-1)*10) +'</td>\n' +
                                '                                        <td>'+r[i]['number']+'</td>\n' +
                                '                                        <td>'+r[i]['name']+'</td>\n' +
                                '                                        <td>'+r[i]['gender']+'</td>\n' +
                                '                                        <td>'+r[i]['id_card']+'</td>\n' +
                                '                                        <td>'+r[i]['post']+'</td>\n' +
                                '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                                '                                    </tr>')
                            setTimeout(function () {
                                $("#select_staff-update").modal('show');
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
            url:'documentary/get_staff',
            type:'POST',
            data:{
                id:$("#jump-update option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_staff-update").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');

                $('#next-update').attr('next',$("#jump-update option:selected").val());
                $('#prve-update').attr('prev',$("#jump-update option:selected").val());
                $("#next-update").parent().attr('class','');
                $("#prve-update").parent().attr('class','');
                $("#add-ok-update").children().remove()
                for (var i = 0; i < r.length; i++){
                    $('#add-ok-update').append('  <tr>\n' +
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
                    $("#select_staff-update").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }
        })
    });

    //选择
    $("#add-ok-update").on('click','.documentary',function () {
        $("#staff_names").val($(this).parents(":eq(0)").children(":eq(2)").html());
        $("#staff_names").attr('staff_id',$(this).parents(":eq(0)").children(":eq(0)").attr('staff_id'))
        $("#select_staff-update").modal('hide');
        $("#myModals").modal('show');
    });


    //client-update

    //select
    var counts_client_update=Math.ceil($("#pages-client-update").attr('count')/10);
    for (var i = 1; i <= counts_client_update; i++){
        $('#jump-client-update').append(' <option value="'+i+'">'+i+'</option>')
    }
    //选择关联公司
    $("#tests-update").click(function () {
        $.ajax({
            url:'documentary/get_client',
            type:'POST',
            beforeSend:function(){
                $('#ok').modal('show');
                $("#myModals").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');
                $("#add-ok-client-update").children().remove();
                for (var i = 0; i < r.length; i++){
                    $('#add-ok-client-update').append('  <tr>\n' +
                        '                                      <td  client_id="'+r[i]['id']+'" >'+parseInt(i+1)+'</td>\n' +
                        '                                        <td>'+r[i]['company']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['tel']+'</td>\n' +
                        '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_client-update").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }

        })
    });

    //下一页
    $("#next-client-update").click(function () {
        var count=Math.ceil($("#pages-client-update").attr('count')/10);
        var i =parseInt($(this).attr('next'));
        var j=i+1;
        $("#prve-client-update").parent().removeClass('disabled');
        if (i < count){
            $(this).attr('next',j);
            $("#prve-client-update").attr('prev',j);
            $.ajax({
                url:'documentary/get_client',
                type:'POST',
                data:{
                    id:j
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $("#select_client-update").modal('hide');
                },
                success:function (r,x,s) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据交互成功!');
                    $("#add-ok-client-update").children().remove();
                    for (var i = 0; i < r.length; i++){
                        $('#add-ok-client-update').append('  <tr>\n' +
                            '                                      <td  client_id="'+r[i]['id']+'" >'+parseInt((i+1)+(j-1)*10)+'</td>\n' +
                            '                                        <td>'+r[i]['company']+'</td>\n' +
                            '                                        <td>'+r[i]['name']+'</td>\n' +
                            '                                        <td>'+r[i]['tel']+'</td>\n' +
                            '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                            '                                    </tr>');

                    }
                    setTimeout(function () {
                        $("#select_client-update").modal('show');
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },100)
                }

            })
        } else {
            $(this).parent().addClass("disabled")
        }
    });

    //上一页
    $("#prve-client-update").click(function () {
        if ($(this).attr('prev') !='no'){
            var i =parseInt($(this).attr('prev'));
            var next=parseInt($("#next-client-update").attr('next'));
            var newNext=next-1;
            var j=i-1;
            $(this).attr('prev',j);
            $("#next-client-update").attr('next',newNext);
            if (i <= 1 ){
                $("#next-client-update").attr('next',newNext+1);
                $(this).parent().addClass('disabled')
                $(this).attr('prev','no');
            }else {
                $.ajax({
                    url:'documentary/get_client',
                    type:'POST',
                    data:{
                        id:j
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $("#select_client-update").modal('hide');
                    },
                    success:function (r,x,s) {
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据交互成功!');
                        $("#add-ok-client-update").children().remove()
                        for (var i = 0; i < r.length; i++){
                            $('#add-ok-client-update').append('  <tr>\n' +
                                '                                      <td  client_id="'+r[i]['id']+'" >'+parseInt((i+1)+(j-1)*10)+'</td>\n' +
                                '                                        <td>'+r[i]['company']+'</td>\n' +
                                '                                        <td>'+r[i]['name']+'</td>\n' +
                                '                                        <td>'+r[i]['tel']+'</td>\n' +
                                '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                                '                                    </tr>');

                        }
                        setTimeout(function () {
                            $("#select_client-update").modal('show');
                            $('#ok').modal('hide');
                            $('#ok-img').attr('src','../home/img/loading.gif');
                            $('#ok-text').html('数据交互中..,');
                        },100)
                    }

                })
            }
        }
    });



    //跳转
    $("#jumps-client-update").click(function () {
        $.ajax({
            url:'documentary/get_client',
            type:'POST',
            data:{
                id:$("#jump-client-update option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_client-update").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');

                $('#next-client-update').attr('next',$("#jump-client-update option:selected").val());
                $('#prve-client-update').attr('prev',$("#jump-client-update option:selected").val());
                $("#next-client-update").parent().attr('class','');
                $("#prve-client-update").parent().attr('class','');
                $("#add-ok-client-update").children().remove()
                for (var i = 0; i < r.length; i++){
                    $('#add-ok-client-update').append('  <tr>\n' +
                        '                                      <td  client_id="'+r[i]['id']+'" >'+ parseInt((i+1)+($("#jump-client-update option:selected").val()-1)*10)+'</td>\n' +
                        '                                        <td>'+r[i]['company']+'</td>\n' +
                        '                                        <td>'+r[i]['name']+'</td>\n' +
                        '                                        <td>'+r[i]['tel']+'</td>\n' +
                        '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_client-update").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }
        })
    });

   // 选择
    $("#add-ok-client-update").on('click','.documentary',function () {
        $("#client_companys").val($(this).parents(":eq(0)").children(":eq(1)").html());
        $("#client_companys").attr('client_id',$(this).parents(":eq(0)").children(":eq(0)").attr('client_id'))
        $("#select_client-update").modal('hide');
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
                url: 'documentary/' + ids + '/edit',
                data: {
                    id: ids
                },
                beforeSend: function () {
                    $('#ok').modal('show');
                },
                success: function (response, stutas, xhr) {
                    $("#titles").val(response['title']);
                    $("#remarks").val(response['remark']);
                    $("#client_companys").val(response['client_company']);
                    $("#client_companys").attr('client_id',response['client_id']);
                    $("#staff_names").val(response['staff_name']);
                    $("#staff_names").attr('staff_id',response['staff_id']);
                    for (var j=1; j< $('#ways option').length; j++){
                        if ( $("#ways option:eq(' "+ j +" ')").val()==response['way']){    //学历
                            $("#ways option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }
                    for (var j=1; j< $('#evolves option').length; j++){
                        if ( $("#evolves option:eq(' "+ j +" ')").val()==response['evolve']){    //学历
                            $("#evolves option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }
                    $('#myModals').modal('show');
                    setTimeout(function () {
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src', '../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    }, 1)
                }
            });
            $("#regs").validate({
                rules: {
                    titles: {
                        required: true,
                        minlength: 2,
                        maxlength: 20,
                    },
                    client_companys: {
                        required: true
                    },
                    staff_names: {
                        required: true
                    },
                    ways: {
                        required: true
                    },
                    evolves: {
                        required: true
                    },
                    remarks: {
                        required: true,
                        maxlength: 20,
                    }
                },
                messages: {
                    titles: {
                        maxlength: '标题内容长度不得大于20位',
                        minlength: '标题内容长度不得小于2位'
                    },
                    remarks: {
                        maxlength: '备注内容不得大于20位',
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        type: 'PUT',
                        url:"documentary/"+ids,
                        data: {
                            id:ids,
                            title:$("#titles").val(),
                            client_id:$("#client_companys").attr('client_id'),
                            client_company:$("#client_companys").val(),
                            staff_id:$("#staff_names").attr('staff_id'),
                            staff_name:$("#staff_names").val(),
                            way:$("#ways option:selected").val(),
                            evolve:$("#evolves option:selected").val(),
                            remark:$("#remarks").val(),
                        },
                        beforeSend:function(){
                            $('#myModals').modal('hide');
                            $('#ok').modal('show');
                        },
                        success:function (response,stutas,xhr){
                            if (response=='true'){
                                $('#ok-img').attr('src','../home/img/jump_success.png');
                                $('#ok-text').html('数据修改成功');

                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().text($('#titles').val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().next().text($("#ways option:selected").val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().next().next().text($("#evolves option:selected").val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().next().next().next().next().text($("#remarks").val());

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
                }
            });
        }
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
                url:'documentary/delete',
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
