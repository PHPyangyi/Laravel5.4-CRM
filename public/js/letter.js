$(function () {
    //laravel-config
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
    UE.getEditor('content',{initialFrameWidth:680,initialFrameHeight:300,});
    UE.getEditor('contents',{initialFrameWidth:680,initialFrameHeight:300,});

    var counts=Math.ceil($("#pages").attr('count')/10);
    for (var i = 1; i <= counts; i++){
        $('#jump').append(' <option value="'+i+'">'+i+'</option>')
    }
    //查看档案
    $("#test").click(function () {
        $.ajax({
            url:'letter/get_staff',
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
                url:'letter/get_staff',
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
                    url:'letter/get_staff',
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
            url:'letter/get_staff',
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


    $("#reg").validate({
        rules:{
            staff_name:{
                required:true
            }
        },
        submitHandler:function(form) {
            $.ajax({
                url:'letter',
                type:'POST',
                data:{
                    staff_name:$("#staff_name").val(),
                    staff_id:$("#staff_name").attr('staff_id'),
                    message:UE.getEditor('content').getContent(),
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $('#myModal').modal('hide');
                },
                success:function (r,s,x) {
                    if (r['id']){
                        //计算长度
                        var str=UE.getEditor('content').getContent();
                        var dd=str.replace(/<\/?.+?>/g,"");
                        var dds=dd.replace(/ /g,"");//dds为得到后的内容
                        if (dds.length>10){
                            var messages= dds.substr(0,10)+'...';
                        }else
                        {
                            var messages=dds;
                        }

                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据添加成功');
                        $('#ok-create').prepend(' <tr class="gradeA odd  '+r['id']+'  select-remove">\n' +
                            '                        <td class="sorting_1">\n' +
                            '                            <div class="text-center">\n' +
                            '                                <input type="checkbox" name="check[]"  yang="yang"  value="'+r['id']+'" >\n' +
                            '                            </div>\n' +
                            '                        </td>\n' +
                            '                        <td class="text-center  ">'+r['staff_name']+'</td>\n' +
                            '                        <td class="text-center">'+messages+'</td>\n' +
                            '                        <td class="text-center  ">'+r['send_name']+'</td>\n' +
                            '                        <td class="text-center">未读</td>\n' +
                            '                        <td class="text-center  ">'+r['created_at']+'</td>\n' +
                            '                        <td class="text-center">\n' +
                            '                            <a class="details"   details_id="'+r['id']+'"><i class="fa fa-file-text-o"></i>  </a>\n' +
                            '                        </td>\n' +
                            '                    </tr>');
                        setTimeout(function () {
                            $('#ok').modal('hide');
                            $('#ok-img').attr('src','../home/img/loading.gif');
                            $('#ok-text').html('数据交互中..,');
                        }, 1000)
                    }
                }
            });
        }
    });



    //list
    $("#ok-create").on('click','.details',function () {
        var yang=this;
        $.ajax({
            type:'GET',
            url:'letter/'+$(this).attr('details_id')+'/edit',
            data:{
                id:$(this).attr('details_id'),
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (response,stutas,xhr) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据添加成功');
                $('#myModalss').modal('show');
                $('#ok').modal('hide');
                $('#list-send_name').html(response['send_name']);
                $('#list-create_time').html(response['created_at']);
                $("#list-message").html(response['message']);
                $(yang).parents(":eq(1)").children(":eq(4)").html('已读');
                setTimeout(function () {
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                }, 1000)
            }
        });

    });


});
