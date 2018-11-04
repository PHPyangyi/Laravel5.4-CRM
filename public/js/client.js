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
                maxlength:20,
            },
            company:{
                required : true,
                minlength : 2,
                maxlength:30,
            },
            tel:{
                required : true,
                minlength : 11,
                maxlength:11,
            },
            source:{
                required:true
            }
        },
        messgaes : {
            name : {
                minlength : '联系人名称长度不得小于2位',
                maxlength: '联系人名称长度不得大于20位',
            },
            company:{
                minlength :  '公司名称名称长度不得小于2位',
                maxlength: '公司名称名称长度不得大于于30位',
            },
            tel:{
                minlength :  '长度不符合',
                maxlength: '长度不符合',
            },
        },
        submitHandler:function(form) {
            $.ajax({
                type: 'POST',
                url: 'client',
                data: {
                    name: $('#name').val(),
                    tel: $("#tel").val(),
                    company: $("#company").val(),
                    source: $("#source").val(),
                },
                beforeSend:function(){
                    $('#myModal').modal('hide');
                    $('#ok').modal('show');
                },
                success:function(response,stutas,xhr){
                    if(response['id']){
                        $('#ok-img').attr('src','../home/img/jump_success.png');
                        $('#ok-text').html('数据添加成功');
                        $('#ok-create').prepend(' <tr class="gradeA odd '+ response['id']+' select-remove">\n' +
                            '                        <td class="sorting_1">\n' +
                            '                            <div class="text-center">\n' +
                            '                                <input type="checkbox" name="check[]"  yang="yang"  value=" '+response['id']+' " >\n' +
                            '                            </div>\n' +
                            '                        </td>\n' +
                            '                        <td class="text-center ">'+ response['company'] +'</td>\n' +
                            '                        <td class="text-center">'+ response['name'] +'</td>\n' +
                            '                        <td class="text-center ">'+ response['tel'] +'</td>\n' +
                            '                        <td class="text-center">'+ response['source'] +'</td>\n' +
                            '                        <td class="text-center ">'+response['enter']+'</td>\n' +
                            '                        <td class="text-center">'+response['created_at']+'</td>\n' +
                            '                    </tr>');
                        if ($("#ok-create").children().length>10){
                            $("#ok-create").children(":eq(10)").remove();
                        }
                        setTimeout(function () {
                            $("#name").val("");
                            $("#tel").val('');
                            $("#company").val('')
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
                url:'client/'+ids+'/edit',
                data:{
                    id:ids
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                },
                success:function (response,stutas,xhr) {
                    $('#names').val(response['name']);
                    $("#companys").val(response['company']);
                    $("#tels").val(response['tel']);
                    for (var j=1; j< $('#sources option').length; j++){
                        if ( $("#sources option:eq(' "+ j +" ')").val()==response['source']){    //员工类型
                            $("#sources option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }
                    $('#myModals').modal('show');
                    setTimeout(function () {
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src','../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    },1)
                }
            });
            $('#regs').validate({
                rules : {
                    names : {
                        required : true,
                        minlength : 2,
                        maxlength:20,
                    },
                    companys:{
                        required : true,
                        minlength : 2,
                        maxlength:30,
                    },
                    tels:{
                        required : true,
                        minlength : 11,
                        maxlength:11,
                    },
                    sources:{
                        required:true
                    }
                },
                messgaes : {
                    names : {
                        minlength : '联系人名称长度不得小于2位',
                        maxlength: '联系人名称长度不得大于20位',
                    },
                    companys:{
                        minlength :  '公司名称名称长度不得小于2位',
                        maxlength: '公司名称名称长度不得大于于30位',
                    },
                    tels:{
                        minlength :  '长度不符合',
                        maxlength: '长度不符合',
                    },
                },
                submitHandler:function(form) {
                    $.ajax({
                        type:'PUT',
                        url:"client/"+ids,
                        data:{
                            name:$('#names').val(),
                            company:$("#companys").val(),
                            tel:$("#tels").val(),
                            source:$("#sources option:selected").val(),
                            id:ids
                        },
                        beforeSend:function(){
                            $('#myModals').modal('hide');
                            $('#ok').modal('show');
                        },
                        success:function (response,stutas,xhr){
                            $('#ok-img').attr('src','../home/img/jump_success.png');
                            $('#ok-text').html('数据添加成功');
                            if (response=='true'){
                                $("[yang=yang]:checkbox:checked").parent().parent().next().text($("#companys").val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().text($("#names").val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().text($("#tels").val());
                                $("[yang=yang]:checkbox:checked").parent().parent().next().next().next().next().text($("#sources option:selected").val());
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
                    });
                }
            });
        }
    });

    //delete
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
                url:'client/delete',
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
