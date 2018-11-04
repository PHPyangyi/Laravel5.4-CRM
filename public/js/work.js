$(function () {
    //laravel-config
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    function p(s) {
        return s < 10 ? '0' + s: s;
    }


    //初始状态
    $('#oks').hide();
    $('#clears').hide();
    //  $('#set_ok').hide();

    $('#adds').on('click',function () {
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate();
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        var s=myDate.getSeconds();
        var now=year+'-'+p(month)+"-"+p(date)+" "+p(h)+':'+p(m)+":"+p(s);

        $('#adds_ok').append('<tr id="tmp_ok">\n' +
            '                                                <td class="text-center">'+parseInt($('#adds_ok').children().length+1)+'</td>\n' +
            '                                                <td class="text-center"><input type="text" class="form-control" id="add_title"></td>\n' +
            '                                                <td class="text-center" id="add_create_time">'+now+'</td>\n' +
            '                                            </tr>');
        $(this).hide();
        $('#oks').show();
        $('#clears').show();
        $('#set_ok').hide();
    });

    $('#clears').on('click',function () {
        $('#tmp_ok').remove();
        $(this).hide();
        $('#oks').hide();
        $('#adds').show();
        $('#set_ok').show();
    });

    //add
    $('#submit').click(function () {
        $.ajax({
            url:'work',
            type:'POST',
            data:{
                'title':$("#title").val(),
                'type':$('#type option:selected').val(),
                'start_date':$("#start_date").val(),
                'end_date':$("#end_date").val(),
            },
            beforeSend:function(){
                $('#ok').modal('show');
                $('#myModal').modal('hide');
            },
            success:function (r,s,x) {
                if (r){
                    $('#ok-img').attr('src','../home/img/jump_success.png');
                    $('#ok-text').html('数据添加成功');
                    $("#ok-create").prepend('<tr class="gradeA odd '+r['id']+' select-remove">\n' +
                        '                        <td class="sorting_1">\n' +
                        '                            <div class="text-center">\n' +
                        '                                <input type="checkbox" name="check[]"  yang="yang"  value="'+r['id']+'">\n' +
                        '                            </div>\n' +
                        '                        </td>\n' +
                        '                        <td class="text-center  ">'+$("#title").val()+'</td>\n' +
                        '                        <td class="text-center">'+$('#type option:selected').val()+'</td>\n' +
                        '                        <td class="text-center ">创建工作计划</td>\n' +
                        '                        <td class="text-center">进行中</td>\n' +
                        '                        <td class="text-center ">'+r['staff_name']+'</td>\n' +
                        '                        <td class="text-center">'+r['allo_name']+'</td>\n' +
                        '                        <td class="text-center ">'+$("#start_date").val()+'</td>\n' +
                        '                        <td class="text-center">'+$("#end_date").val()+'</td>\n' +
                        '                        <td class="text-center">'+r['created_at']+'</td>\n' +
                        '                        <td class="text-center">\n' +
                        '                            <a class="details"   details_id="'+r['id']+'"><i class="fa fa-file-text-o"></i>  </a>\n' +
                        '                        </td>\n' +
                        '                    </tr>');
                    setTimeout(function () {
                        $('#ok').modal('hide');
                        $('#ok-img').attr('src', '../home/img/loading.gif');
                        $('#ok-text').html('数据交互中..,');
                    }, 1000)
                }
            }
        })
    });


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
            //   $('#myModals').modal('show');
            $.ajax({
                type:'GET',
                url:'work/'+ids+'/edit',
                data:{
                    id:ids
                },
                beforeSend:function(){
                    $('#ok').modal('show');
                },
                success:function (response,stutas,xhr) {
                    $('#adds_ok').children().remove();
                    var data=response;
                    newData=response.split("@@");
                    json01=newData[0];
                    json02=newData[1];
                    var listArray= JSON.parse(json01);
                    //list
                    if (listArray['state']=='已完成'){
                        $('#set_ok').hide();
                        $('#adds').hide();
                    }else
                    {
                        $('#set_ok').show();
                        $('#adds').show();
                    }
                    $('#titles').val(listArray['title']);
                    $('#types').val(listArray['type']);
                    $('#start_dates').val(listArray['start_date']);
                    $('#end_dates').val(listArray['end_date']);
                    var productArray=JSON.parse(json02);
                    console.log(productArray)
                    for (var i=0; i<productArray.length; i++){
                        $('#adds_ok').append(' <tr>\n' +
                            '                                                <td class="text-center">'+ parseInt(i+1) +'</td>\n' +
                            '                                                <td class="text-center">'+ productArray[i]['title'] +'</td>\n' +
                            '                                                <td class="text-center">'+productArray[i]['created_at']+'</td>\n' +
                            '                                            </tr>');
                    }
                    $('#myModals').modal('show');
                    $('#ok').modal('hide');

                }
            })

        }
        $('#oks').on('click',function () {
            $.ajax({
                url:'work/extend',
                type:'POST',
                data:{
                    'work_id':ids,
                    'title':$('#add_title').val(),
                    'create_time':$('#add_create_time').html(),
                },
                success:function (r,s,x) {
                    if (r){
                        $(this).hide();
                        $('#oks').hide();
                        $('#adds').show();
                        $('#set_ok').show();
                        $('#adds_ok').append('');
                        $('#adds_ok').append(' <tr>\n' +
                            '                                                <td class="text-center">'+  parseInt($('#adds_ok').children().length)  +'</td>\n' +
                            '                                                <td class="text-center">'+ $('#add_title').val()  +'</td>\n' +
                            '                                                <td class="text-center">'+$('#add_create_time').html() +'</td>\n' +
                            '                                            </tr>');
                        $("[yang=yang]:checkbox:checked").parents(":eq(2)").children(":eq(3)").html($('#add_title').val() );
                        $('#tmp_ok').remove();
                        $("#clears").hide();
                    }
                }

            });
        });

        $('#set_ok').on('click',function () {
            $.ajax({
                'url':'work/set_ok',
                'type':'POST',
                data:{
                    'id':ids,
                },
                success:function (r,s,x) {
                    $('#set_ok').hide();
                    $('#adds').hide();
                    $("[yang=yang]:checkbox:checked").parents(":eq(2)").children(":eq(4)").html('已完成');
                }
            })
        })

    });

    //list
    $("#ok-create").on('click','.details',function () {
        $.ajax({
            type:'GET',
            url:'work/'+$(this).attr('details_id')+'/edit',
            data:{
                id:$(this).attr('details_id'),
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (response,stutas,xhr) {
                $('#list-add_ok').children().remove();
                var data=response;
                newData=response.split("@@");
                json01=newData[0];
                json02=newData[1];
                var listArray= JSON.parse(json01);
                //list
                $("#list-title").html(listArray['title']);
                $("#list-type").html(listArray['type']);
                $("#list-stage").html(listArray['stage']);
                $("#list-state").html(listArray['state']);
                $("#list-staff_name").html(listArray['staff_name']);
                $("#list-allo_name").html(listArray['allo_name']);
                $("#list-start_time").html(listArray['start_date']);
                $("#list-end_date").html(listArray['end_date']);
                $("#list-create_time").html(listArray['created_at']);
                var productArray=JSON.parse(json02);
                console.log(productArray)
                for (var i=0; i<productArray.length; i++){
                    $('#list-add_ok').append(' <tr>\n' +
                        '                                                <td class="text-center">'+ parseInt(i+1) +'</td>\n' +

                        '                                                <td class="text-center">'+ productArray[i]['title'] +'</td>\n' +
                        '                                                <td class="text-center">'+productArray[i]['created_at']+'</td>\n' +
                        '                                            </tr>');
                }
                $('#myModalss').modal('show');
                $('#ok').modal('hide');

            }
        })
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
                url:'work/delete',
                data:{
                    id:num,
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
                    }

                }
            })
        }else {
            alert('至少有一个选中');
        }
    });

});
