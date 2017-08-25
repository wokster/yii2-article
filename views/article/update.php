<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = 'Редактировать статью: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="article-update">
  <div class="box">
    <div class="box-header with-border">
      <h5>Редактировать <small class="m-l-sm"><?=  $this->title ?>: форма редакторования</small></h5>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <?= $this->render('_form', [
          'model' => $model,
      ]) ?>
    </div>
  </div>
</div>
