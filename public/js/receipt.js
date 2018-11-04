$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //select
    var counts=Math.ceil($("#pages").attr('count')/10);
    for (var i = 1; i <= counts; i++){
        $('#jump').append(' <option value="'+i+'">'+i+'</option>')
    }
    //查看档案
    $("#test").click(function () {
        $.ajax({
            url: 'receipt/get_order',
            type: 'POST',
            beforeSend: function () {
                $('#ok').modal('show');
                $("#myModal").modal('hide');
            },
            success: function (r, x, s) {
                $('#ok-img').attr('src', '../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');
                $("#add-ok").children().remove();
                for (var i = 0; i < r.length; i++) {
                    $('#add-ok').append('<tr>\n' +
                        '                                        <td order_id="'+r[i]['id']+'">'+parseInt(i+1)+'</td>\n' +
                        '                                        <td>'+r[i]['sn']+'</td>\n' +
                        '                                        <td>'+r[i]['title']+'</td>\n' +
                        '                                        <td>'+r[i]['original']+'</td>\n' +
                        '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_order").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src', '../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                }, 100)
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
                url: 'receipt/get_order',
                type:'POST',
                data:{
                    id:j
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $("#select_order").modal('hide');
                },
                success:function (r,x,s) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据交互成功!');
                    $("#add-ok").children().remove();
                    for (var i = 0; i < r.length; i++){
                        $('#add-ok').append('<tr>\n' +
                            '                                        <td order_id="'+r[i]['id']+'">'+parseInt((i+1)+(j-1)*10)+'</td>\n' +
                            '                                        <td>'+r[i]['sn']+'</td>\n' +
                            '                                        <td>'+r[i]['title']+'</td>\n' +
                            '                                        <td>'+r[i]['original']+'</td>\n' +
                            '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                            '                                    </tr>');
                    }
                    setTimeout(function () {
                        $("#select_order").modal('show');
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
                    url: 'receipt/get_order',
                    type:'POST',
                    data:{
                        id:j
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $("#select_order").modal('hide');
                    },
                    success:function (r,x,s) {
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据交互成功!');
                        $("#add-ok").children().remove()
                        for (var i = 0; i < r.length; i++){
                            $('#add-ok').append('<tr>\n' +
                                '                                        <td order_id="'+r[i]['id']+'">'+parseInt((i+1)+(j-1)*10)+'</td>\n' +
                                '                                        <td>'+r[i]['sn']+'</td>\n' +
                                '                                        <td>'+r[i]['title']+'</td>\n' +
                                '                                        <td>'+r[i]['original']+'</td>\n' +
                                '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                                '                                    </tr>');
                        }
                        setTimeout(function () {
                            $("#select_order").modal('show');
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
    $("#jumps").click(function () {
        $.ajax({
            url: 'receipt/get_order',
            type:'POST',
            data:{
                id:$("#jump option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_order").modal('hide');
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
                    $('#add-ok').append('<tr>\n' +
                        '                                        <td order_id="'+r[i]['id']+'">'+parseInt((i+1)+($("#jump option:selected").val()-1)*10)+'</td>\n' +
                        '                                        <td>'+r[i]['sn']+'</td>\n' +
                        '                                        <td>'+r[i]['title']+'</td>\n' +
                        '                                        <td>'+r[i]['original']+'</td>\n' +
                        '                                       <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_order").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }
        })
    });

    //选择
    $("#add-ok").on('click','.documentary',function () {
        $("#order_sn").val(($(this).parents(":eq(0)").children(":eq(1)").html()));
        $("#select_order").modal('hide');
        $("#b").html($(this).parents(":eq(0)").children(":eq(3)").html())
        $("#myModal").modal('show');
    });


    $('#submit').click(function () {
        $.ajax({
            type:'POST',
            url:'receipt',
            data:{
                title:$("#title").val(),
                order_sn:$("#order_sn").val(),
                cost:$("#cost").val(),
                remark:$("#remark").val(),
            },

            beforeSend:function(){
                $('#myModal').modal('hide');
                $('#ok').modal('show');
            },
            success:function(response,stutas,xhr){
                if (response) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据添加成功');
                    $('#ok-create').prepend(' <tr>\n' +
                        '                        <td class="text-center">'+ response['title'] +'</td>\n' +
                        '                        <td class="text-center">'+ response['order_sn'] +'</td>\n' +
                        '                        <td class="text-center">'+ response['cost'] +'</td>\n' +
                        '                        <td class="text-center">'+response['enter']+'</td>\n' +
                        '                        <td class="text-center">'+response['created_at']+'</td>\n' +
                        '                    </tr>');
                    setTimeout(function () {
                        $("#select_staffs").modal('show');
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },100)
                }else {
                    $('#ok-img').attr('src','/../home/img/jump_error.png');
                    $('#ok-text').html(response['msg']);
                    setTimeout(function () {
                        $("#select_staffs").modal('show');
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },100)
                }

            }

        });
    });


});
