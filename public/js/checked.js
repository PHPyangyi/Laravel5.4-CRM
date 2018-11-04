$(function() {  //prop和attr方法都是设置或者修改被选元素的属性，
    // prop方法用于HTML元素本身就带有的固有属性，
    // attr方法用于HTML元素自己定义的dom属性，

    $("#checkedAll").click(function() {

        if (this.checked) {

            $("[yang=yang]:checkbox").prop("checked", true);
        }else {

            $("[yang=yang]:checkbox").prop("checked", false);
        }
    });

    $("#checkboxAll").click(function() {

        $("[yang=yang]:checkbox").prop("checked", true);
    });

    $("#checkedNo").click(function() {

        $("[yang=yang]:checkbox").prop("checked", false);
    });

    $("#checkedRev").click(function() {

        $("[yang=yang]:checkbox").each(function() {
            console.log(this.checked);
            this.checked = !this.checked//this指当前的html对象
        });
    });

    $("#submit").click(function() {

        var str = "你喜欢的是："
        $("[yang=yang]:checkbox:checked").each(function() {

            str += $(this).val() + "||";//这里$(this)指的是jquery对象
        })

        console.log(str);
    });
})