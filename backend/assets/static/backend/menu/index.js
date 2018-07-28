layui.use(['table','jquery'], function(){
    var table = layui.table
        ,form = layui.form;
    var $ = layui.jquery;
    table.render({
        elem: '#menuTable'
        ,url:'/menu/user/'
        ,cellMinWidth: 80
        ,cols: [[
            {type:'numbers', fixed: 'left'}
            ,{type: 'checkbox'}
            ,{field:'id', title:'ID', width:100, unresize: true, sort: true}
            ,{field:'name', title:'菜单名', width:350,templet: '#usernameTpl'}
            ,{field:'url', title:'URI',width:350}
            ,{field:'state', title:'状态', width:110, templet: '#switchTpl', unresize: true}
            ,{field:'lock', title:'是否锁定', width:110, templet: '#checkboxTpl', unresize: true}
            ,{field:'lock', title:'操作', width:180,toolbar: '#barDemo'}
        ]]
        ,page: true
        ,id: 'menuTable'
    });

    //监听状态操作
    form.on('switch(sexDemo)', function(obj){
        var id = this.value;
        var state = obj.elem.checked;
        $.ajax({
            url : '/menu/change-state',
            type : 'post',
            dataType : 'json',
            data : {'id':id,'state':state},
            success : function (res) {
                layer.tips(res.msg, obj.othis);
            }
        });

    });
    //监听锁定操作
    form.on('checkbox(lockDemo)', function(obj){
        var id = this.value;
        var state = obj.elem.checked;
        $.ajax({
            url : '/menu/change-lock',
            type : 'post',
            dataType : 'json',
            data : {'id':id,'state':state},
            success : function (res) {
                console.log(res);
                layer.tips(res.msg, obj.othis);
            }
        });
    });
    //新增菜单
    $(document).on('click','#newBtn',function(){
        window.location.href='/menu/add-view';
    });
    //删除选中
    $(document).on('click','#delSelBtn',function(){
        var checkStatus = table.checkStatus('menuTable'),data = checkStatus.data;
        if(data.length == 0){
            layer.msg('请先勾选需要删除的菜单！');
        }
        active.deleteRecord(data)
    });
    //监听工具条
    table.on('tool(menuFilter)', function(obj){
        var data = obj.data;
        if(obj.event === 'detail'){
            active.popWind(data);
            // layer.msg('ID：'+ data.id + ' 的查看操作');
        } else if(obj.event === 'del'){
            layer.confirm('真的删除行么', function(index){
                if(active.deleteRecord([data])){
                    obj.del();
                    layer.close(index);
                }
            });
        } else if(obj.event === 'edit'){
            window.location.href='/menu/edit-view?id='+data.id;
        }
    });

    //操作
    var active = {
        //执行table重载
        reload: function () {
            table.reload('menuTable', {
                page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
        },
        //删除记录
        deleteRecord:function(data){
            var result = false;
            $.ajax({
                url : '/menu/del-menu',
                type : 'post',
                async : false,
                dataType : 'json',
                data : {'data':data},
                success : function (res) {
                    layer.msg(res.msg, {
                        time: 2000, //2s后自动关闭
                        btn: ['知道了']
                    },function(){
                        if(res.result){
                            result = true;
                            active.reload();
                        }
                    });
                }
            });
            return result;
        },
        popWind:function(obj){
            //多窗口模式，层叠置顶
            layer.open({
                type: 2 //此处以iframe举例
                ,title: obj.name
                ,area: ['390px', '260px']
                ,shade: 0
                ,maxmin: true
                ,id: 'viewMenu' //设定一个id，防止重复弹出
                ,offset: [
                    $(window).height()-($(window).height()/2)-260/2
                    ,$(window).width()-($(window).width()/2)-390/2
                ]
                ,content: 'http://layer.layui.com/test/settop.html'
                ,btn: ['关闭'] //只是为了演示
                ,btn1: function(){
                    layer.closeAll();
                }
                ,zIndex: layer.zIndex //重点1
                ,success: function(layero){
                    layer.setTop(layero); //重点2
                }
            });
        }
    }
});