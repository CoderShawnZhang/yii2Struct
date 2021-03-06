layui.use(['form', 'jquery'], function(){
    var form = layui.form
        ,layer = layui.layer
    var $ = layui.jquery;

    //监听提交
    form.on('submit(submitEditBtn)', function(data){
        $.ajax({
            url : '/menu/edit',
            type : 'post',
            dataType : 'json',
            data : data.field,
            success : function (res) {
                layer.msg(res.msg, {
                    time: 5000,
                    btn: ['知道了']
                },function () {
                    window.location.href='/menu/index';
                });

            }
        });
        return false;
    });
    //监听状态开关
    form.on('switch(state)',function(obj){
        if(obj.elem.checked){
            layer.tips('开启显示', obj.othis);
        }else{
            layer.tips('关闭显示', obj.othis);
        }
    });
    //监听锁定开关
    form.on('primary(lock)',function(obj){
        if(obj.elem.checked){
            layer.tips('开启锁定', obj.othis);
        }else{
            layer.tips('关闭锁定', obj.othis);
        }
    });
});