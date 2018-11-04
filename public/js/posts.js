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

    //add
    $('#reg').validate({
        rules : {
            name : {
                required : true,
                minlength : 2,
                maxlength:10,
                remote:{
                    url:'post/checkUnique',
                    type:'POST',
                    data:{
                        name:function(){
                            return  $("#name").val()
                        }
                    }

                }
            },
        },
        messages : {
            name : {
                required : '职位不得为空！',
                minlength : '帐号不得小于2位！',
                maxlength:'职位名称不得大于10位！',
                remote:'此职位名称已存在！',
            },
        },
        submitHandler:function(form) {
            $.ajax({
                url:'post',
                type:'POST',
                data:{
                    name:$("#name").val(),
                },
                beforeSend:function(){
                    $('#myModal').modal('hide');
                    $('#ok').modal('show');
                },
                success:function (response,stutas,xhr) {
                    if(response['id']){
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据添加成功');
                        $('#ok-create').prepend('<tr  class="gradeA odd select-remove  '+ response['id']+' ">\n' +
                            '                    <td class="sorting_1"><div class="text-center"><input   type="checkbox" yang="yang" name="check[]" value="'+ response['id']+'"></div></td>\n' +
                            '                    <td class="text-center" id="y">'+$("#name").val()+'</td>\n' +
                            '                    <td class="text-center">'+ response['created_at'] +'</td>\n' +
                            '                </tr>');
                        if ($("#ok-create").children().length>10){
                            $("#ok-create").children(":eq(10)").remove();
                        }
                        setTimeout(function () {
                            $("#name").val("");
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
        },

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
        }else{
            var ids=$("[yang=yang]:checkbox:checked").val();
            $.ajax({
                type:'GET',
                url:'post/'+ids+'/edit',
                data:{
                    id:ids
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                },
                success:function (response,stutas,xhr) {
                    $("#names").val(response['name']);
                    $('#myModals').modal('show');
                    setTimeout(function () {
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },1)
                }
            })

            //update and validate
            $("#regs").validate({
                rules : {
                    names : {
                        required : true,
                        minlength : 2,
                        maxlength:10,
                        remote:{
                            url:'post/checkUnique',
                            type:'POST',
                            data:{
                                name:function(){
                                    return  $("#names").val()
                                }
                            }

                        }
                    },
                },
                messages : {
                    names : {
                        required : '职位不得为空！',
                        minlength : '帐号不得小于2位！',
                        maxlength:'职位名称不得大于10位！',
                        remote:'此职位名称已存在！',
                    },
                },
                submitHandler:function(form) {
                    $.ajax({
                        url:"post/"+ids,
                        type:"PUT",
                        data:{
                            name:$('#names').val(),
                            id:ids
                        },
                        beforeSend:function(){
                            $('#myModals').modal('hide');
                            $('#ok').modal('show');
                        },
                        success:function (response,stutas,xhr) {
                            if (response=='true'){
                                $('#ok-img').attr('src','../home/img/jump_success.png');
                                $('#ok-text').html('数据修改成功');
                                $("[yang=yang]:checkbox:checked").parents(":eq(1)").next().text($('#names').val());
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
                },
            })
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
                url:'post/delete',
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

    //select先搁置

});
