<?php
use backend\widgets\leftTree\leftTree;
?>
<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <ul class="layui-nav layui-nav-tree "  lay-filter="test">
            <!--菜单管理-->
            <?=leftTree::widget(['viewName'=>'menu'])?>
            <!--订单管理-->
            <?=leftTree::widget(['viewName'=>'order'])?>
            <!--商品管理-->
            <?=leftTree::widget(['viewName'=>'goods'])?>
            <!--采购管理-->
            <?=leftTree::widget(['viewName'=>'purchase'])?>
            <!--账务管理-->
            <?=leftTree::widget(['viewName'=>'amount'])?>
            <!--报表管理-->
            <?=leftTree::widget(['viewName'=>'report'])?>
            <li class="layui-nav-item"><a href="/main/index">主页</a></li>
            <li class="layui-nav-item"><a href="">发布商品</a></li>
        </ul>
    </div>
</div>