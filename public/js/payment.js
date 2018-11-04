$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#ok-create").on('click','.details',function () {
        $.ajax({
            type:"GET",
            url:'inlib/'+$(this).attr('details_id')+'/details',
            data:{
                id:$(this).attr('details_id'),
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (r,s,x) {
                $('#ok-img').attr('src','../home/img/jump_success.png');
                $('#ok-text').html('数据交互成功');
                setTimeout(function () {
                    $('#myModalss').modal('show');
                    $('#ok').modal('hide');
                    $("#details_name").html(r['name']);
                    $("#details_sn").html(r['sn']);
                    $("#details_type").html(r['type']);
                    $("#details_pro_price").html(r['pro_price']);
                    $("#details_number").html(r['number']);
                    $("#details_staff_name").html(r['staff_name']);
                    $("#details_mode").html(r['mode']);
                    $("#details_mode_explain").html(r['mode_explain']);
                    $("#details_enter").html(r['enter']);
                    $("#details_create_time").html(r['created_at']);
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                }, 200)
            }


        });
    });


});
