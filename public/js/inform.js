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



    $('#reg').validate({
        rules : {
            name : {
                required : true,
                minlength : 2,
                maxlength:20,
            },
        },
        messages : {
            name : {
                required : '标题不得为空！',
                minlength : '标题不得小于2位！',
                maxlength:'标题不得大于10位！',
            },
        },
        submitHandler:function(form) {
            $.ajax({
                type: 'POST',
                url: 'inform',
                data: {
                    title: $("#name").val(),
                    details: UE.getEditor('contents').getContent(),
                },
                beforeSend:function(){
                    $('#myModal').modal('hide');
                    $('#ok').modal('show');
                },
                success:function(response,stutas,xhr){
                    if(response['id']>0){
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据添加成功');
                        $('#ok-create').prepend('<tr class="gradeA odd  '+response['id']+'  select-remove">\n' +
                            '                        <td class="sorting_1">\n' +
                            '                            <div class="text-center">\n' +
                            '                                <input type="checkbox" name="check[]"  yang="yang"  value="'+response['id']+'" >\n' +
                            '                            </div>\n' +
                            '                        </td>\n' +
                            '                        <td class="text-center  ">'+response['title']+'</td>\n' +
                            '                        <td class="text-center">'+response['staff_name']+'</td>\n' +
                            '                        <td class="text-center  ">'+response['created_at']+'</td>\n' +
                            '                        <td class="text-center">\n' +
                            '                            <a class="details"   details_id="'+response['id']+'"><i class="fa fa-file-text-o"></i>  </a>\n' +
                            '                        </td>\n' +
                            '                    </tr>');
                        setTimeout(function () {
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

    //edit
    $('#edit').click(function() {
        if (!$("[yang=yang]:checkbox:checked").length > 0 || $("[yang=yang]:checkbox:checked").length > 1) {
            $(document).ready(function () {
                swal({
                    title: "警告",
                    text: "至少有一个被选中，且只能选中一个"
                });
            });
        } else {
            var ids=$("[yang=yang]:checkbox:checked").val();
            $.ajax({
                type:'GET',
                url:'inform/'+ids+'/edit',
                data:{
                    id:ids
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                },
                success:function (response,stutas,xhr) {
                    $('#names').val(response['title']);
                    UE.getEditor('content').setContent(response['details'])
                    $('#myModals').modal('show');
                    setTimeout(function () {
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },1)
                }
            });
            //update
            $('#regs').validate({
                rules: {
                    names: {
                        required: true,
                        minlength: 2,
                        maxlength: 20,
                    },
                },
                messages: {
                    names: {
                        required: '标题不得为空！',
                        minlength: '标题不得小于2位！',
                        maxlength: '标题不得大于10位！',
                    },
                },
                submitHandler:function(form) {
                    $.ajax({
                        url:"inform/"+ids,
                        type:"PUT",
                        data:{
                            title:$('#names').val(),
                            details:UE.getEditor('content').getContent(),
                            id:ids
                        },
                        beforeSend:function(){
                            $('#myModals').modal('hide');
                            $('#ok').modal('show');
                        },
                        success:function (response,stutas,xhr){
                            if (response=='true'){
                                $('#ok-img').attr('src','../home/img/jump_success.png');
                                $('#ok-text').html('数据修改成功');
                                $("[yang=yang]:checkbox:checked").parent().parent().next().text($('#names').val());
                                setTimeout(function () {
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
                        },
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
                url:'inform/delete',
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

    //list
    $("#ok-create").on('click','.details',function () {
        $.ajax({
            type:"GET",
            url:'inform/'+$(this).attr('details_id')+'/edit',
            data:{
                id:$(this).attr('details_id'),
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (r,s,x) {
                $('#myModalss').modal('show');
                $('#ok').modal('hide');

                $("#details_title").html(r['title']);
                $("#details_staff_name").html(r['staff_name']);
                $("#details_create_time").html(r['created_at']);
                $("#details_details").html(r['details']);
                setTimeout(function () {
                    $('#ok-img').attr('src', '/__IMG__/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                }, 1000)
            }
        });
    });


});
