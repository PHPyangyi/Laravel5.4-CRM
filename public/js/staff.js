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
        rules : {
            name : {
                required :  true,
                minlength : 2,
                maxlength : 20,
            },
            number:{
                required : true,
                minlength : 4,
                maxlength : 4,
                remote:{
                    url:'staff/checkUnique',
                    type:'POST',
                    data:{
                        number:function(){
                            return  $("#number").val()
                        }
                    }

                }
            },
            gender:{
                required :  true,
            },
            post:{
                required :  true,
            },
            type:{
                required :  true,
            },
            id_card:{
                required :  true,
                minlength : 18,
                maxlength : 18,
                remote:{
                    url:'staff/checkUnique',
                    type:'POST',
                    data:{
                        id_card:function(){
                            return  $("#id_card").val()
                        }
                    }

                }
            },
            tel:{
                required :  true,
                minlength : 11,
                maxlength : 11,
                remote:{
                    url:'staff/checkUnique',
                    type:'POST',
                    data:{
                        tel:function(){
                            return  $("#tel").val()
                        }
                    }

                }
            },
            nation:{
                required :  true,
                minlength : 2,
                maxlength : 5,
            },
            marital_status:{
                required :  true,
            },
            entry_status:{
                required :  true,
            },
            entry_date:{
                required :  true,
                date:true
            },
            dimission_date:{
                required :  true,
                date:true
            },
            politics_statu:{
                required :  true,
                maxlength : 2,
            },
            education:{
                required :  true,
                maxlength : 2,
            },
            health:{
                required :  true,
                maxlength : 30,
            },
            specialty:{
                required :  true,
                maxlength : 20,
            },
            registered:{
                required :  true,
            },
            registered_address:{
                required :  true,
                maxlength : 50,
            },
            graduate_date:{
                required :  true,
                date:true
            },
            graduate_college:{
                required :  true,
            },
            intro:{
                required :  true,
            },

        },
        messages : {
            name : {
                minlength : "姓名长度不得小于2位",
                maxlength : "姓名长度不得大于20位",
            },
            number:{
                minlength : "工号长度必须是4位",
                maxlength : "工号长度必须是4位",
                remote:'此工号已存在！',
            },
            id_card:{
                minlength : "身份证长度不符！",
                maxlength : "身份证长度不符！",
                remote:'此身份证已存在！'
            },
            tel:{
                minlength : "移动电话长度不符！",
                maxlength : "移动电话长度不符！",
                remote:'此移动电话号码已存在！'
            },
            nation:{
                minlength : "长度不得小于2位",
                maxlength : "长度不得大于5位",
            },
            politics_statu:{
                maxlength : "长度不得大于2位",
            },
            education:{
                maxlength : "长度不得大于2位",
            },
            health:{
                maxlength : "长度不得大于30位",
            },
            specialty:{
                maxlength : "长度不得大于20位",
            },
            registered_address:{
                maxlength : "长度不得大于50位",
            },

        },
        submitHandler:function(form) {
            $('#submit').click(function () {
                $.ajax({
                    url:'staff',
                    type:'POST',
                    data:{
                        name:$('#name').val(), //姓名
                        gender:$('[name=gender]:radio:checked').val(),  //性别
                        number:$('#number').val(),  //工号
                        type:$('#type option:selected').val(),
                        post:$('#post option:selected').val(),  //职位
                        id_card:$('#id_card').val(),  //身份证
                        tel:$('#tel').val(),  //电话号码
                        marital_status:$('#marital_status option:selected').val(),  //婚姻状态
                        nation:$('#nation').val(),  //民族
                        entry_date:$('#zaizhi_date').val(),   //在职时间
                        dimission_date:$('#dimission-date').val(),  //离职时间
                        education:$('#education option:selected').val(),   //学历
                        entry_status:$('#entry_status option:selected').val(),  //入职状态
                        specialty:$('#specialty').val(),  //专业
                        health:$('#health').val(),  //健康
                        registered:$('#registered option:selected').val(),  //户口
                        registered_address:$('#registered_address').val(),  //户口所在地
                        graduate_date:$('#graduate_date').val(),
                        graduate_college:$('#graduate_college').val(),
                        intro:$('#intro').val(),
                        details:UE.getEditor('content').getContent(),
                        politics_statu:$('#politics_statu option:selected').val()
                    },
                    beforeSend:function(){
                        $('#myModal').modal('hide');
                        $('#ok').modal('show');
                    },
                    success:function (r,s,x) {
                        if (r['id'] > 0) {
                            $('#ok-img').attr('src','../home/img/jump_success.png');
                            $('#ok-text').html('数据添加成功');
                            $('#ok-create').prepend('<tr class="gradeA odd  '+ r['id'] +'  select-remove">\n' +
                                '                        <td class="sorting_1">\n' +
                                '                            <div class="text-center">\n' +
                                '                                <input type="checkbox" name="check[]"  yang="yang"  value=" '+r['id']+' " >\n' +
                                '                            </div>\n' +
                                '                        </td>\n' +
                                '                        <td class="text-center ">'+$('#number').val()+'</td>\n' +
                                '                        <td class="text-center">'+$('#name').val()+'</td>\n' +
                                '                        <td class="text-center ">'+ $('[name=gender]:radio:checked').val() +' </td>\n' +
                                '                        <td class="text-center">'+ $('#id_card').val() +'</td>\n' +
                                '                        <td class="text-center ">'+ $('#post option:selected').val() +'</td>\n' +
                                '                        <td class="text-center">'+$('#nation').val()+'</td>\n' +
                                '                        <td class="text-center ">'+ $('#type option:selected').val() +'</td>\n' +
                                '                        <td class="text-center">'+$('#tel').val()+'</td>\n' +
                                '                        <td class="text-center ">'+ $('#entry_status option:selected').val() +'</td>\n' +
                                '                        <td class="text-center">'+ $('#zaizhi_date').val() +'</td>\n' +
                                '                        <td class="text-center ">'+ $('#marital_status option:selected').val() +'</td>\n' +
                                '                        <td class="text-center">'+ $('#education option:selected').val() +'</td>\n' +
                                '                        <td class="text-center">\n' +
                                '                            <a  class="details"   details_id=" '+ r['id'] +' "><i class="fa fa-file-text-o"></i>  </a>\n' +
                                '                        </td>\n' +
                                '                    </tr>');
                            if ($("#ok-create").children().length>10){
                                $("#ok-create").children(":eq(10)").remove();
                            }
                            setTimeout(function () {
                                $('#ok').modal('hide');
                                $('#ok-img').attr('src','../home/img/loading.gif');
                                $('#ok-text').html('数据交互中..,');
                            }, 1000)

                        }else{
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
    })

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
                url: 'staff/' + ids + '/edit',
                data: {
                    id: ids
                },
                beforeSend: function () {
                    $('#ok').modal('show');
                },
                success: function (response, stutas, xhr) {
                    if (response['gender']=='男'){     //性别
                        $('#inlineRadio1s')[0].checked = true
                        $('#inlineRadio2s').removeAttr("checked");
                    } else {
                        $('#inlineRadio2s')[0].checked = true
                        $('#inlineRadio1s').removeAttr("checked");
                    }
                    $('#numbers').val(response['number']);  //工号
                    $('#names').val(response['name']);  // 姓名
                    $('#id_cards').val(response['id_card'])  //身份证
                    $('#tels').val(response['tel']);  // 电话
                    $('#nations').val(response['nation'])  //民族
                    $('#zaizhi_dates').val(response['entry_date']),   //在职时间
                    $('#dimission-dates').val(response['dimission_date']),  //离职时间
                    $('#specialtys').val(response['specialty']),  //专业
                    $('#healths').val(response['health']),  //健康
                    $('#registered_addresss').val(response['registered_address']);  //户口所在地
                    $('#intros').val(response['intro']);
                    $('#graduate_colleges').val(response['graduate_college']);
                    $('#graduate_dates').val(response['graduate_date']);
                    $("#check_id").val(response['id']);
                    UE.getEditor('contents').setContent(response['details'])

                    for (var j=1; j< $('#types option').length; j++){
                        if ( $("#types option:eq(' "+ j +" ')").val()==response['type']){    //员工类型
                            $("#types option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }

                    for (var j=1; j< $('#posts option').length; j++){
                        if ( $("#posts option:eq(' "+ j +" ')").val()==response['post']){    //职位
                            $("#posts option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }
                    for (var j=1; j< $('#marital_statuss option').length; j++){
                        if ( $("#marital_statuss option:eq(' "+ j +" ')").val()==response['marital_status']){    //婚姻状态
                            $("#marital_statuss option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }

                    for (var j=1; j< $('#educations option').length; j++){
                        if ( $("#educations option:eq(' "+ j +" ')").val()==response['education']){    //学历
                            $("#educations option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }

                    for (var j=1; j< $('#entry_statuss option').length; j++){
                        if ( $("#entry_statuss option:eq(' "+ j +" ')").val()==response['entry_status']){    //入职状态
                            $("#entry_statuss option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }

                    for (var j=1; j< $('#politics_status option').length; j++){
                        if ( $("#politics_status option:eq(' "+ j +" ')").val()==response['politics_statu']){    //政治面貌
                            $("#politics_status option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }

                    for (var j=1; j< $('#registereds option').length; j++){
                        if ( $("#registereds option:eq(' "+ j +" ')").val()==response['registered']){    //政治面貌
                            $("#registereds option:eq(' "+ j +" ')").attr('selected','selected');

                        }
                    }

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
            rules : {
                names : {
                    required :  true,
                    minlength : 2,
                    maxlength : 20,
                },
                numbers:{
                    required : true,
                    minlength : 4,
                    maxlength : 4,
                    remote:{
                        url:'staff/checkUnique',
                        type:'POST',
                        data:{
                            number:function(){
                                return  $("#numbers").val();
                            },
                            id:function () {
                                return $("#check_id").val();
                            }
                        }

                    }
                },
                genders:{
                    required :  true,
                },
                posts:{
                    required :  true,
                },
                types:{
                    required :  true,
                },
                id_cards:{
                    required :  true,
                    minlength : 18,
                    maxlength : 18,
                    remote:{
                        url:'staff/checkUnique',
                        type:'POST',
                        data:{
                            id_card:function(){
                                return  $("#id_cards").val();
                            },
                            id:function () {
                                return $("#check_id").val();
                            }
                        }

                    }
                },
                tels:{
                    required :  true,
                    minlength : 11,
                    maxlength : 11,
                    remote:{
                        url:'staff/checkUnique',
                        type:'POST',
                        data:{
                            tel:function(){
                                return  $("#tels").val();
                            },
                            id:function () {
                                return $("#check_id").val();
                            }
                        }

                    }
                },
                nations:{
                    required :  true,
                    minlength : 2,
                    maxlength : 5,
                },
                marital_statuss:{
                    required :  true,
                },
                entry_statuss:{
                    required :  true,
                },
                entry_dates:{
                    required :  true,
                    date:true
                },
                dimission_dates:{
                    required :  true,
                    date:true
                },
                politics_status:{
                    required :  true,
                    maxlength : 2,
                },
                educations:{
                    required :  true,
                    maxlength : 2,
                },
                healths:{
                    required :  true,
                    maxlength : 30,
                },
                specialtys:{
                    required :  true,
                    maxlength : 20,
                },
                registereds:{
                    required :  true,
                },
                registered_addresss:{
                    required :  true,
                    maxlength : 50,
                },
                graduate_dates:{
                    required :  true,
                    date:true
                },
                graduate_colleges:{
                    required :  true,
                },
                intros:{
                    required :  true,
                },

            },
            messages : {
                names : {
                    minlength : "姓名长度不得小于2位",
                    maxlength : "姓名长度不得大于20位",
                },
                numbers:{
                    minlength : "工号长度必须是4位",
                    maxlength : "工号长度必须是4位",
                    remote:'此工号已存在！',
                },
                id_cards:{
                    minlength : "身份证长度不符！",
                    maxlength : "身份证长度不符！",
                    remote:'此身份证已存在！'
                },
                tels:{
                    minlength : "移动电话长度不符！",
                    maxlength : "移动电话长度不符！",
                    remote:'此移动电话号码已存在！'
                },
                nations:{
                    minlength : "长度不得小于2位",
                    maxlength : "长度不得大于5位",
                },
                politics_status:{
                    maxlength : "长度不得大于2位",
                },
                educations:{
                    maxlength : "长度不得大于2位",
                },
                healths:{
                    maxlength : "长度不得大于30位",
                },
                specialtys:{
                    maxlength : "长度不得大于20位",
                },
                registered_addresss:{
                    maxlength : "长度不得大于50位",
                },
            },
            submitHandler:function(form) {
                $('#submits').click(function(){
                     $.ajax({
                         type:'PUT',
                         url:"staff/"+ids,
                         data:{
                             id:ids,
                             name:$('#names').val(), //姓名
                             gender:$('[name=genders]:radio:checked').val(),  //性别
                             number:$('#numbers').val(),  //工号
                             type:$('#types option:selected').val(),
                             post:$('#posts option:selected').val(),  //职位
                             id_card:$('#id_cards').val(),  //身份证
                             tel:$('#tels').val(),  //电话号码
                             marital_status:$('#marital_statuss option:selected').val(),  //婚姻状态
                             nation:$('#nations').val(),  //民族
                             entry_date:$('#zaizhi_dates').val(),   //在职时间
                             dimission_date:$('#dimission-dates').val(),  //离职时间
                             education:$('#educations option:selected').val(),   //学历
                             entry_status:$('#entry_statuss option:selected').val(),  //入职状态
                             specialty:$('#specialtys').val(),  //专业
                             health:$('#healths').val(),  //健康
                             registered:$('#registereds option:selected').val(),  //户口
                             registered_address:$('#registered_addresss').val(),  //户口所在地
                             graduate_date:$('#graduate_dates').val(),
                             graduate_college:$('#graduate_colleges').val(),
                             intro:$('#intros').val(),
                             details:UE.getEditor('contents').getContent(),
                             politics_statu:$('#politics_status option:selected').val()
                         },
                         beforeSend:function(){
                             $('#myModals').modal('hide');
                             $('#ok').modal('show');
                         },
                         success:function (response,stutas,xhr){
                             if (response=='true'){
                                 $('#ok-img').attr('src','../home/img/jump_success.png');
                                 $('#ok-text').html('数据删除成功');
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").next().text($('#numbers').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(1)").text($('#names').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(2)").text($('[name=genders]:radio:checked').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(3)").text($('#id_cards').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(4)").text($('#posts option:selected').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(5)").text($('#nations').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(6)").text($('#types option:selected').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(7)").text($('#tels').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(8)").text($('#entry_statuss option:selected').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(9)").text($('#entry-dates').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(10)").text($('#marital_statuss option:selected').val());
                                 $("[yang=yang]:checkbox:checked").parents(":eq(1)").nextAll(":eq(11)").text($('#educations option:selected').val());
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
                         },
                     })
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
                url:'staff/delete',
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
            url:'staff/'+$(this).attr('details_id')+'/edit',
            data:{
                id:$(this).attr('details_id'),
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (r,s,x) {
                $("#details_name").html(r['name']);
                $("#details_number").html(r['number']);
                $("#details_gender").html(r["gender"]);
                $("#details_post").html(r["post"]);
                $("#details_state").html(r["state"]);
                $('#details_intro').html(r['intro']);
                $("#details_details").html(r['details']);
                $("#details_accounts").html(r['accounts']);
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