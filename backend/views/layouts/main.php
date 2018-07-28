<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
$AppAsset = AppAsset::register($this);
$assetPath = $AppAsset->baseUrl;
Yii::$app->params['assetPath'] = $assetPath;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="layui-layout layui-layout-admin">
        <?=$this->render('top');?>
        <?=$this->render('left');?>
        <div class="layui-body" style="margin-left: 5px;padding-right: 10px;">
            <?= $content ?>
        </div>
        <?=$this->render('footer');?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
