
    <div class="layui-card" style="margin-top: 20px;">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-workorder">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">订单号</label>
                    <div class="layui-input-block">
                        <input type="text" name="orderSn" placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">订单类型</label>
                    <div class="layui-input-inline">
                        <select name="orderType" lay-search="">
                            <option value="">直接选择或搜索选择</option>
                            <option value="1">layer</option>
                            <option value="2">form</option>
                            <option value="3">layim</option>
                            <option value="4">element</option>
                            <option value="5">laytpl</option>
                            <option value="6">upload</option>
                            <option value="7">laydate</option>
                            <option value="8">laypage</option>
                            <option value="9">flow</option>
                            <option value="10">util</option>
                            <option value="11">code</option>
                            <option value="12">tree</option>
                            <option value="13">layedit</option>
                            <option value="14">nav</option>
                            <option value="15">tab</option>
                            <option value="16">table</option>
                            <option value="17">select</option>
                            <option value="18">checkbox</option>
                            <option value="19">switch</option>
                            <option value="20">radio</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">下单时间</label>
                    <div class="layui-input-inline">
                        <input type="text" name="created" id="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">下单人</label>
                    <div class="layui-input-block">
                        <input type="text" name="creater" placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-order" lay-submit="" lay-filter="LAY-app-order-search" id="searchBtn">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <table class="layui-hide" id="LAY_table_user" lay-filter="user"></table>

<script>
    layui.use(['table','element'], function(){
        var table = layui.table;
        var $ = layui.jquery,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块

        //方法级渲染
        table.render({
            elem: '#LAY_table_user'
            ,url: '/orders/list'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'orderId', title: 'ID', width:80, sort: true, fixed: true}
                ,{field:'orderSn', title: '用户名', width:80}
                ,{field:'orderType', title: '性别', width:80, sort: true}
                ,{field:'buyerName', title: '城市', width:80}
                ,{field:'buyerMobile', title: '签名'}
                ,{field:'created', title: '积分', sort: true, width:80}
                ,{field:'modified', title: '评分', sort: true, width:80}
                ,{field:'creater', title: '职业', width:80}
            ]]
            ,id: 'testReload'
            ,page: true
            ,height: 315
        });

        //监听单元格编辑
        table.on('edit(test3)', function(obj){
            var value = obj.value //得到修改后的值
                ,data = obj.data //得到所在行所有键值
                ,field = obj.field; //得到字段
            layer.msg('[ID: '+ data.id +'] ' + field + ' 字段更改为：'+ value);
        });

        $(document).on('click','#searchBtn',function(){
            active.reload();
        });

        var active = {
            reload:function(){
                var orderSn = $("input[name=orderSn]").val();
                var orderType = $("input[name=orderType]").val();
                table.reload('testReload',{
                    page:{
                        curr:1
                    },
                    where:{
                        key:{
                            orderSn:orderSn,
                            orderType:orderType,
                        }
                    }
                });
            }
        }
    });
</script>