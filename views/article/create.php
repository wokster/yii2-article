<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = 'Создать статью';
$this->params['breadcrumbs'][] = ['label' => 'статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">
    <div class="box">
        <div class="box-header with-border">
                <h5>Создать<small class="m-l-sm"><?=  $this->title ?>: форма добавления</small></h5>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
         </div>
    </div>
</div>

