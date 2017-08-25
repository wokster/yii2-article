<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search row">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="col-xs-3">    <?= $form->field($model, 'id') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'title') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'url') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'text') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'status_id') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'image') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'date_create') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'type_id') ?>

</div>    <div class="form-group col-xs-12">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
