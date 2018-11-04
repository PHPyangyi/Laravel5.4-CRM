$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //list
    $("#ok-create").on('click','.details',function () {
        var id = $(this).attr('details_id');
        $.ajax({
            type:"GET",
            url:'procure/'+id+'/details',
            data:{
                id:id
            },
            beforeSend:function(){
                $('#ok').modal('show');
            },
            success:function (r,s,x) {
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
                setTimeout(function () {
                    $('#ok-img').attr('src','../home/img/loading.gif');
                    $('#ok-text').html('数据交互中..,');
                }, 500)

            }


        });
    });
});
