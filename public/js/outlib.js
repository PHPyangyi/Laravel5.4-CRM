$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //出库
    $("#outlib").click(function(){
        if ($("[yang=yang]:checkbox:checked").length>0){
            var delete_id=[];
            var test=[];
            var i=0;

            $.each($("[yang=yang]:checkbox:checked"),function(){
                if(this.checked){
                    delete_id[i]=$(this).val();
                    i++;
                }
            });

            $.each($("[yang=yang]:checkbox:checked"),function(){
                if(this.checked){
                    test[i]=$(this).parent().parent().parent().children(":eq(8)").html();
                    i++;
                }
            });
            var num=JSON.stringify((delete_id));
            var arr=new Array(test);

            if (IsInArray(arr,'未处理') || IsInArray(arr,'已出货')) {
                $(document).ready(function () {
                    swal({
                        title: "警告",
                        text: "出库货物必须是已收款状态下"
                    });
                });
            }else {
                $.ajax({
                    url:'outlib/ok',
                    type:'POST',
                    data:{
                        'id':num,
                    },
                    beforeSend:function(){
                        $('#ok').modal('show');
                    },
                    success:function (r,s,x) {
                        if (r){
                            for (var i=0; i<$("[yang=yang]:checkbox:checked").length; i++){
                                $("[yang=yang]:checkbox:checked").eq(i).parent().parent().parent().children(":eq(8)").html('已出货');
                                $("[yang=yang]:checkbox:checked").eq(i).parent().parent().parent().children(":eq(6)").html(r['clerk']);
                                $("[yang=yang]:checkbox:checked").eq(i).parent().parent().parent().children(":eq(9)").html(r['date']);
                            }
                        }
                        $('#ok-img').attr('src','/__IMG__/jump_success.png');
                        $('#ok-text').html('货物出库成功');
                        setTimeout(function () {
                            $("[yang=yang]:checkbox:checked").attr('checked',false);
                            $('#ok').modal('hide');
                            $('#ok-img').attr('src','/__IMG__/loading.gif');
                            $('#ok-text').html('数据交互中..,');
                        },1000)
                    }
                })
            }

        }else {
            $(document).ready(function () {
                swal({
                    title: "警告",
                    text: "至少有一个被选中！"
                });
            });
        }
    });


    //php == in_array();
    function IsInArray(arr,val){

        var testStr=','+arr.join(",")+",";

        return testStr.indexOf(","+val+",")!=-1;

    }



});
