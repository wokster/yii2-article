<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model \wokster\article\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="btn-group">
                        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => 'Вы уверены, что хотите безвозвратно удалить статью?',
                        'method' => 'post',
                        ],
                        ]) ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    
																		'id',
                                    'title',
                                    ['attribute'=>'url','format'=>'url','value'=>Yii::$app->frontUrlManager->createUrl(['/article/one','url'=>$model->url])],
                                    'text:raw',
                                    'status',
                                    'image',
                                    'date_create:datetime',
                                    'type_id',
                                    'date_start',
                                    'date_finish:datetime',
                                                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>