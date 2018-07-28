<?php
use \backend\assets\AppAsset;
$AppAsset = AppAsset::register($this);
?>


<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>菜单列表</legend>
</fieldset>
<div class="layui-main">
    <div class="LAY_preview">
        <button class="layui-btn" id="newBtn">新增菜单</button>
        <button class="layui-btn layui-btn-danger" id="delSelBtn">删除选中</button>
    </div>
</div>
<table class="layui-hide" id="menuTable" lay-filter="menuFilter"></table>

<script type="text/html" id="switchTpl">
    <input type="checkbox" name="sex" value="{{d.id}}" lay-skin="switch" lay-text="开|关" lay-filter="sexDemo" {{ d.state == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="checkboxTpl">
    <input type="checkbox" name="lock" value="{{d.id}}" title="锁定" lay-filter="lockDemo" {{ d.lock == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<?= $this->registerJsFile($AppAsset->baseUrl . "/backend/menu/index.js"); ?>