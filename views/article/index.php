<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'статьи';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="box-header with-border">
            <h5>статьи <small class="m-l-sm">записей <?= $dataProvider->getCount()?> из <?= $dataProvider->getTotalCount()?></small></h5>
            <div class="box-tools pull-right">
              <a class="collapse-link" title="сложить"><i class="fa fa-chevron-up"></i></a>
              <a class="fullscreen-link">
                <i class="fa fa-expand"></i>
              </a>
              <a href="<?=\yii\helpers\Url::toRoute('create')?>" title="создать статья"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="box-body">
        	<?php Pjax::begin(['id' => 'grid'])?>
			<?= GridView::widget([
                'summary' => '',
                'dataProvider' => $dataProvider,
                'options' => ['class'=>'table-responsive minHeight'],
				'filterModel' => $searchModel,
				'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],
                  'id',
                  'title',
                  ['attribute'=>'url','format'=>'url', 'value'=>function($model){ return Yii::$app->frontUrlManager->createUrl(['/article/one','url'=>$model->url]);}],
                  ['attribute' => 'status_id','label' => 'статус','filter'=> Yii::$app->modules['article']->status_list, 'value' => 'status'],
                  'image',
                  'date_create:datetime',
                  ['attribute' => 'type_id','label' => 'тип','filter'=> $searchModel->getTypeList(),'value' => 'typeName'],
                  ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        	<?php Pjax::end();?>
        </div>
    </div>
