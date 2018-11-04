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
    var counts=Math.ceil($("#pages").attr('count')/3);
    for (var i = 1; i <= counts; i++){
        $('#jump').append(' <option value="'+i+'">'+i+'</option>')
    }

    //关联跟单
    $("#test").click(function () {
        $.ajax({
            url:'order/get_documentary',
            type:'POST',
            beforeSend:function(){
                $('#ok').modal('show');
                $("#myModal").modal('hide');
            },
            success:function (r,x,s) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功！');
                $("#add-ok").children().remove()
                for (var i = 0; i < r.length; i++){
                    $('#add-ok').append(' <tr>\n' +
                        '                                        <td documentary_id="'+r[i]['id']+'">'+parseInt(i+1)+'</td>\n' +
                        '                                        <td>'+r[i]['sn']+'</td>\n' +
                        '                                        <td>'+r[i]['title']+'</td>\n' +
                        '                                        <td>'+r[i]['client_company']+'</td>\n' +
                        '                                        <td>'+r[i]['staff_name']+'</td>\n' +
                        '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }

                setTimeout(function () {
                    $("#select_documentary").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }

        })
    });


    //下一页
    $("#next").click(function () {
        var count=Math.ceil($("#pages").attr('count')/3);
        var i =parseInt($(this).attr('next'));
        var j=i+1;
        $("#prve").parent().removeClass('disabled');
        if (i < count){
            $(this).attr('next',j);
            $("#prve").attr('prev',j);
            $.ajax({
                url:'order/get_documentary',
                type:'POST',
                data:{
                    id:j
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                    $("#select_documentary").modal('hide');
                },
                success:function (r,x,s) {
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据交互成功!');
                    $("#add-ok").children().remove();
                    for (var i = 0; i < r.length; i++){
                        $('#add-ok').append(' <tr>\n' +
                            '                                        <td documentary_id="'+r[i]['id']+'">'+parseInt((i+1)+(j-1)*3)+'</td>\n' +
                            '                                        <td>'+r[i]['sn']+'</td>\n' +
                            '                                        <td>'+r[i]['title']+'</td>\n' +
                            '                                        <td>'+r[i]['client_company']+'</td>\n' +
                            '                                        <td>'+r[i]['staff_name']+'</td>\n' +
                            '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                            '                                    </tr>');
                    }
                    setTimeout(function () {
                        $("#select_documentary").modal('show');
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
                    url:'order/get_documentary',
                    type:'POST',
                    data:{
                        id:j
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                        $("#select_documentary").modal('hide');
                    },
                    success:function (r,x,s) {
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据交互成功!');
                        $("#add-ok").children().remove()
                        for (var i = 0; i < r.length; i++){
                            $('#add-ok').append(' <tr>\n' +
                                '                                        <td documentary_id="'+r[i]['id']+'">'+parseInt((i+1)+(j-1)*3)+'</td>\n' +
                                '                                        <td>'+r[i]['sn']+'</td>\n' +
                                '                                        <td>'+r[i]['title']+'</td>\n' +
                                '                                        <td>'+r[i]['client_company']+'</td>\n' +
                                '                                        <td>'+r[i]['staff_name']+'</td>\n' +
                                '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                                '                                    </tr>');
                        }
                        setTimeout(function () {
                            $("#select_documentary").modal('show');
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
            url:'order/get_documentary',
            type:'POST',
            data:{
                id:$("#jump option:selected").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $("#select_documentary").modal('hide');
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
                    $('#add-ok').append(' <tr>\n' +
                        '                                        <td documentary_id="'+r[i]['id']+'">'+parseInt((i+1)+($("#jump option:selected").val()-1)*3)+'</td>\n' +
                        '                                        <td>'+r[i]['sn']+'</td>\n' +
                        '                                        <td>'+r[i]['title']+'</td>\n' +
                        '                                        <td>'+r[i]['client_company']+'</td>\n' +
                        '                                        <td>'+r[i]['staff_name']+'</td>\n' +
                        '                                        <td  style="cursor:pointer" class="documentary"><span class="glyphicon glyphicon-ok"> 选择</span></td>\n' +
                        '                                    </tr>');
                }
                setTimeout(function () {
                    $("#select_documentary").modal('show');
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },100)
            }
        })
    });

    //选择
    $("#add-ok").on('click','.documentary',function () {
        $("#client_company").val($(this).parents(":eq(0)").children(":eq(2)").html());
        $("#client_company").attr('documentary_id',$(this).parents(":eq(0)").children(":eq(0)").attr('documentary_id'));
        $("#client_company").attr('client_company', $(this).parents(":eq(0)").children(":eq(3)").html());
        $("#client_company").attr('staff_name', $(this).parents(":eq(0)").children(":eq(4)").html());
        $("#select_documentary").modal('hide');
        $("#myModal").modal('show');
    });


    //
    $("#add").click(function () {
        $("#myModal").modal('hide');
        $("#product").modal('show');
    });
    $(".num").keyup(function () {
        if (Number( $(this).val() ) >  Number( $(this).parent().prev().html())){
            $(this).val($(this).parent().prev().html());
        }
    })

    $("#product").on('click','.documentary',function () {
        if ($(this).prev().children().val()==0){
            alert('数量不得小于等于0')
        }else {

            var num1= $(this).prev().prev().html();
            var num2= $(this).prev().children().val();
            var num3= num1 - num2;
            $(this).prev().prev().html(num3);
            if (num3==0){
                $(this).parent().remove()
            }

            var num4=num2 *  $(this).prev().prev().prev().html() ;
            var num5= Number($("#q").html());

            var num6=num5 + num4;
            $("#q").html(num6)



            $("#documentary_ok").append('<tr  class="documentary_class">\n' +
                '                                        <td>'+ $(this).prev().prev().prev().prev().prev().prev().html() +'</td>\n' +
                '                                        <td>'+ $(this).prev().prev().prev().prev().prev().html() +'</td>\n' +
                '                                        <td>'+ $(this).prev().prev().prev().prev().html() +'</td>\n' +
                '                                        <td>'+$(this).prev().prev().prev().html()+'</td>\n' +
                '                                        <td documentary_id="'+$(this).prev().prev().prev().prev().prev().prev().prev().html() +'">'+ $(this).prev().children().val() +'</td>\n' +
                '                                         \n' +
                '                                         \n' +
                '                                        <td  class="delete" style="cursor:pointer"><span class="glyphicon glyphicon-remove"></span></td>\n' +
                '                                    </tr>');

            $("#product").modal('hide');
            $("#myModal").modal('show');
        }

    });

    //delete
    $('#documentary_ok').on('click','.delete',function () {
        $(this).parent().remove();
        var num1=$(this).parent().children().next().next().next().html();
        var num2=$(this).parent().children().next().next().next().next().html();
        var num3=num1*num2;
        var num4=$("#q").html();
        var num5=num4-num3;
        $("#q").html(num5);
    });


    $('#submit').click(function () {
        // alert($("#documentary_ok  ").children(":eq(0)").children(":eq(4)").attr('documentary_id'));
        var myarray = new Array();
        for (var i = 0; i < $("#documentary_ok ").children().length; i++) {
            myarray[i] = [$('#documentary_ok').children(':eq("' + i + '")').children(":eq(4)").html(), $('#documentary_ok').children(':eq("' + i + '")').children(":eq(4)").attr('documentary_id')];
        }
        myarray = JSON.stringify(myarray);

        $.ajax({
            type: 'POST',
            url: 'order',
            data: {
                data: myarray,
                title: $("#title").val(),
                documentary_id: $('#client_company').attr('documentary_id'),
                original: $("#x").val(),
                details: $("#remarks").val(),
                cost: $("#q").html(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $('#myModal').modal('hide');
            },
            success:function (r,s,x) {
                if (r['id'] > 0) {
                    $('#ok-img').attr('src', '/__IMG__/jump_success.png');
                    $('#ok-text').html('数据添加成功');

                    $('#ok-create').prepend('<tr class="gradeA odd '+ r['id'] +' select-remove">\n' +
                        '                        <td class="sorting_1">\n' +
                        '                            <div class="text-center">\n' +
                        '                                <input type="checkbox" name="check[]"  yang="yang"  value=" '+ r['id'] +' " >\n' +
                        '                            </div>\n' +
                        '                        </td>\n' +
                        '                        <td class="text-center">'+r['sn']+'</td>\n' +
                        '                        <td class="text-center">'+$("#title").val()+'</td>\n' +
                        '                        <td class="text-center">'+ $("#client_company").attr("client_company") +'</td>\n' +
                        '                        <td class="text-center">'+$("#x").val()+'</td>\n' +
                        '                        <td class="text-center">'+ $("#client_company").attr("staff_name")  +'</td>\n' +
                        '                        <td class="text-center">未支付</td>\n' +
                        '                        <td class="text-center">'+r['enter']+'</td>\n' +
                        '                        <td class="text-center">'+r['created_at']+'</td>\n' +
                        '                        <td class="text-center">\n' +
                        '                            <a class="details"   details_id="'+r['id']+'"><i class="fa fa-file-text-o"></i>  </a>\n' +
                        '                        </td>\n' +
                        '                    </tr>');

                    setTimeout(function () {
                        $("#select_staffs").modal('show');
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    }, 1000)
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


    $("#ok-create").on('click','.details',function () {
        $.ajax({
            type:"GET",
            url:'order/'+$(this).attr('details_id')+'/edit',
            data:{
                id:$(this).attr('details_id'),
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (r,s,x) {
                $('#list_ok').children().remove();
                $('#myModalss').modal('show');
                var data=r;
                newData=r.split("@@");
                json01=newData[0];
                json02=newData[1];
                var listArray= JSON.parse(json02);
                //
                // //list
                $('#order_title').html(listArray['title']);
                $('#order_sn').html(listArray['sn']);
                $('#order_original').html(listArray['original']);
                $('#order_cost').html(listArray['cost']);
                $('#order_enter').html(listArray['enter']);
                $("#order_create_time").html(listArray['create_time']['date']);
                $("#order_client_company").html(listArray['client_company']);
                $("#order_staff_name").html(listArray['staff_name']);
                $("#order_details").html(listArray['details']);

                //table
                var productArray=JSON.parse(json01);

                for (var i=0; i<productArray.length; i++){
                    $("#list_ok").prepend('  <tr>\n' +
                        '                                    <td class="text-center">'+ productArray[i]['sn'] +'</td>\n' +
                        '                                    <td class="text-center">'+ productArray[i]['name'] +'</td>\n' +
                        '                                    <td class="text-center">'+ productArray[i]['sell_price'] +'</td>\n' +
                        '                                    <td class="text-center">'+ productArray[i]['number'] +'</td>\n' +
                        '                                    <td class="text-center">'+productArray[i]['state']  +'</td>\n' +
                        '                                    <td class="text-center">'+ productArray[i]['dispose_time'] +'</td>\n' +
                        '                                </tr>')
                }

                $('#ok').modal('hide');
            }
        });
    });w





});
