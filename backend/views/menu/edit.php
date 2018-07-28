<?php
use \backend\assets\AppAsset;
$AppAsset = AppAsset::register($this);
?>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>新增菜单</legend>
</fieldset>

<form class="layui-form">
    <input type="hidden" name="id" value="<?=$model->id;?>">
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-block">
            <input type="text" name="name" lay-verify="title" autocomplete="off" placeholder="请输入菜单名称" class="layui-input" value="<?=$model->name;?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">URI</label>
        <div class="layui-input-block">
            <input type="text" name="url" lay-verify="required" placeholder="请输入URI" autocomplete="off" class="layui-input" value="<?=$model->url;?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否显示</label>
        <div class="layui-input-block">
            <input type="checkbox" checked="" name="state" lay-skin="switch" lay-filter="state" lay-text="开|关">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否锁定</label>
        <div class="layui-input-block">
            <input type="checkbox" checked="" name="lock" lay-skin="switch" lay-filter="lock" lay-text="开|关">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="submitEditBtn">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<?= $this->registerJsFile($AppAsset->baseUrl . "/backend/menu/edit.js"); ?>