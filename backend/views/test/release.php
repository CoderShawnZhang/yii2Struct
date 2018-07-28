<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\select2\Select2;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'gender')->dropDownList(['男'=>'男','女'=>'女']) ?>
<?= $form->field($model, 'student_number') ?>
<?= $form->field($model, 'mobile') ?>
<?= $form->field($model, 'if_big')->dropDownList(['有'=>'有','没有'=>'没有']) ?>
<?= $form->field($model, 'if_alipay')->dropDownList(['是'=>'是','否'=>'否']) ?>
<?= $form->field($model, 'if_present')->dropDownList(['是'=>'是','否'=>'否']) ?>
<?= $form->field($model, 'sell_time')->dropDownList(['全天'=>'全天','上午'=>'上午','下午'=>'下午']) ?>

<?php
foreach ($goods as $index => $v) {
    echo $form->field($v, "[{$index}]name")->label($v->name);
    echo $form->field($v, "[{$index}]cate")->dropDownList(['书籍'=>'书籍','生活用品'=>'生活用品','电子产品'=>'电子产品','其他'=>'其他'])->label($v->name);
    echo $form->field($v, "[{$index}]number")->label($v->name);
}
?>
<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
