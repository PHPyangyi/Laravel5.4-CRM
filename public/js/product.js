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
    UE.getEditor('content',{initialFrameWidth:680,initialFrameHeight:400,});
    UE.getEditor('contents',{initialFrameWidth:680,initialFrameHeight:400,});

    //add
    $("#reg").validate({
        rules:{
            sn:{
                required :  true,
                minlength : 5,
                maxlength : 5,
                remote:{
                    url:'product/checkUnique',
                    type:'POST',
                    data:{
                        sn:function(){
                            return  $("#sn").val()
                        }
                    }

                }
            },
            name:{
                required :  true,
                minlength : 2,
                maxlength : 20,
            },
            type:{
                required :  true,
            },
            pro_price:{
                required :  true,
                number:true
            },
            sell_price:{
                required :  true,
                number:true
            },
            unit:{
                required : true,
            },
            inventory_alarm:{
                required :  true,
                number:true
            }

        },
        messages:{
            sn:{
                minlength :'产品编号必须是5位',
                maxlength : '产品编号必须是5位',
                remote:'此产品编号已存在！',
            },
            name:{
                minlength : '产品名称不得小于2位',
                maxlength : '产品名称不得大于20位',
            },
        },
        submitHandler:function(form) {
            $('#submit').unbind('click').bind('click',function(){
                $.ajax({
                    url:'product',
                    type:'POST',
                    data:{
                        name:$('#name').val(), //姓名
                        sn:$("#sn").val(),
                        pro_price:$("#pro_price").val(),
                        sell_price:$("#sell_price").val(),
                        unit:$("#unit").val(),
                        inventory_alarm:$("#inventory_alarm").val(),
                        details:UE.getEditor('content').getContent(),
                        type:$('#type option:selected').val(),
                    },
                    beforeSend:function(){
                        $('#myModal').modal('hide');
                        $('#ok').modal('show');
                    },
                    success:function (r,s,x) {
                        if (r['id'] > 0) {
                            $('#ok-img').attr('src','../home/img/jump_success.png');
                            $('#ok-text').html('数据修改成功');
                            $('#ok-create').prepend('<tr class="gradeA odd  '+ r['id'] +'  select-remove">\n' +
                                '                        <td class="sorting_1">\n' +
                                '                            <div class="text-center">\n' +
                                '                                <input type="checkbox" name="check[]"  yang="yang"  value=" '+ r['id'] +' " >\n' +
                                '                            </div>\n' +
                                '                        </td>\n' +
                                '                        <td class="text-center  ">'+ $("#sn").val() +'</td>\n' +
                                '                        <td class="text-center">'+ $("#name").val() +'</td>\n' +
                                '                        <td class="text-center  ">'+ $('#type option:selected').val()+'</td>\n' +
                                '                        <td class="text-center">'+ $("#unit").val() +'</td>\n' +
                                '                        <td class="text-center  ">'+ $("#pro_price").val() +'</td>\n' +
                                '                        <td class="text-center">'+ $("#sell_price").val() +'</td>\n' +
                                '                        <td class="text-center  ">0</td>\n' +
                                '                        <td class="text-center">0</td>\n' +
                                '                        <td class="text-center  ">0</td>\n' +
                                '                        <td class="text-center">'+ $("#inventory_alarm").val() +'</td>\n' +
                                '                        <td class="text-center  ">'+r['created_at']+'</td>\n' +
                                '                        <td class="text-center">\n' +
                                '                            <a class="details"   details_id=" '+ r['id'] +' "><i class="fa fa-file-text-o"></i>  </a>\n' +
                                '                        </td>\n' +
                                '                    </tr>');
                            if ($("#ok-create").children().length>10){
                                $("#ok-create").children(":eq(10)").remove();
                            }
                            setTimeout(function () {
                                    $('#name').val(''), //姓名
                                    $("#sn").val(''),
                                    $("#pro_price").val(''),
                                    $("#sell_price").val(''),
                                    $("#unit").val(''),
                                    $("#inventory_alarm").val(''),
                                   // $('#type option:selected').val('')
                                    UE.getEditor('content').setContent('');
                                $('#ok').modal('hide');
                                $('#ok-img').attr('src','../home/img/loading.gif');
                                $('#ok-text').html('数据交互中..,');
                            }, 1000);
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
            });
        }
    });

    //edit
    $('#edit').click(function() {
        if (!$("[yang=yang]:checkbox:checked").length > 0 || $("[yang=yang]:checkbox:checked").length > 1) {
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
                url: 'product/' + ids + '/edit',
                data: {
                    id: ids
                },
                beforeSend: function () {
                    $('#ok').modal('show');
                },
                success:function (response,stutas,xhr) {
                    $('#ok').modal('hide');
                    $("#names").val(response['name']);
                    $("#sns").val(response['sn']);
                    $("#pro_prices").val(response['pro_price']);
                    $("#sell_prices").val(response['pro_price']);
                    $("#units").val(response['unit']);
                    $("#inventory_alarms").val(response['inventory_alarm']);
                    UE.getEditor('contents').setContent(response['details']);
                    for (var j=1; j< $('#types option').length; j++){
                        if ( $("#types option:eq(' "+ j +" ')").val()==response['type']){
                            $("#types option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }
                    $("#check_id").val(response['id']);
                    $('#myModals').modal('show');
                    setTimeout(function () {
                        $('#ok-img').attr('src','/__IMG__/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },1)
                }
            });
        }
        //update
        $("#regs").validate({
            rules:{
                sns:{
                    required :  true,
                    minlength : 5,
                    maxlength : 5,
                    remote:{
                        url:'product/checkUnique',
                        type:'POST',
                        data:{
                            sn:function(){
                                return  $("#sns").val()
                            },
                            id:function () {
                                return $("#check_id").val();
                            }
                        }

                    }
                },
                names:{
                    required :  true,
                    minlength : 2,
                    maxlength : 20,
                },
                types:{
                    required :  true,
                },
                pro_prices:{
                    required :  true,
                    number:true
                },
                sell_prices:{
                    required :  true,
                    number:true
                },
                units:{
                    required : true,
                },
                inventory_alarms:{
                    required :  true,
                    number:true
                }

            },
            messages:{
                sns:{
                    minlength :'产品编号必须是5位',
                    maxlength : '产品编号必须是5位',
                    remote:'此产品编号已存在！',
                },
                names:{
                    minlength : '产品名称不得小于2位',
                    maxlength : '产品名称不得大于20位',
                },
            },
            submitHandler:function(form) {
                $('#submits').click(function(){
                    $.ajax({
                        type:'PUT',
                        url:"product/"+ids,
                        data:{
                            id:ids,
                            name:$('#names').val(), //姓名
                            sn:$("#sns").val(),
                            pro_price:$("#pro_prices").val(),
                            sell_price:$("#sell_prices").val(),
                            unit:$("#units").val(),
                            inventory_alarm:$("#inventory_alarms").val(),
                            details:UE.getEditor('contents').getContent(),
                            type:$('#types option:selected').val(),
                        },
                        beforeSend:function(){
                            $('#myModals').modal('hide');
                            $('#ok').modal('show');
                        },
                        success:function (response,stutas,xhr){
                            if (response=='true'){
                                $('#ok-img').attr('src','../home/img/jump_success.png');
                                $('#ok-text').html('数据修改成功');
                                $("[yang=yang]:checkbox:checked").parent().parent().next().text($('#sns').val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().text($('#names').val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().text($('#types option:selected').val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().text($('#units').val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().next().text($('#pro_prices').val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().next().next().text($('#sell_prices').val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().next().next().next().next().next().text($('#entry_statuss option:selected').val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().next().next().next().next().next().next().text($("#inventory_alarms").val());
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
                })
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
                url:'product/delete',
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

    //details
    $("#ok-create").on('click','.details',function () {
        $.ajax({
            type:"GET",
            url:'product/'+$(this).attr('details_id')+'/edit',
            data:{
                id:$(this).attr('details_id'),
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (r,s,x) {
                $("#details_name").html(r['name']);
                $("#details_sn").html(r['sn']);
                $("#details_type").html(r["type"]);
                $("#details_unit").html(r["unit"]);
                $("#details_pro_price").html(r["pro_price"]);
                $("#details_create_time").html(r["created_at"]);
                $('#details_sell_price').html(r['sell_price']);
                $("#details_details").html(r['details']);
                $("#details_inventory_in").html(r['inventory_in']);
                $('#myModalss').modal('show');
                setTimeout(function () {
                    $("[yang=yang]:checkbox:checked").attr('checked',false);
                    $('#ok').modal('hide');
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                },1000)
            }
        });
    });





});
