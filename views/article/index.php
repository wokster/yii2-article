<?php

use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \wokster\article\models\ArticleSearch*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'статьи';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php BoxWidget::begin([
  'title'=>'статьи <small class="m-l-sm">записей '.$dataProvider->getCount().' из '.$dataProvider->getTotalCount().'</small>',
  'buttons' => [
      ['link', '<i class="fa fa-plus" aria-hidden="true"></i>',['create','type'=>$searchModel->type_id],['title'=>'создать статью']]
  ]
]);?>
<?php Pjax::begin(['id' => 'grid'])?>
<?= GridView::widget([
    'summary' => '',
    'dataProvider' => $dataProvider,
    'options' => ['class'=>'table-responsive minHeight'],
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        ['class' => 'yii\grid\ActionColumn'],
        'id',
        'title',
        ['attribute'=>'url','format'=>'url', 'value'=>function($model){ return Yii::$app->frontUrlManager->createUrl(['/article/one','url'=>$model->url]);}],
        ['attribute' => 'status_id','label' => 'статус','filter'=> Yii::$app->modules['article']->status_list, 'value' => 'status'],
        ['attribute' => 'image', 'value' => 'smallImage', 'format'=>'image'],
        'date_create:datetime',
        ['attribute' => 'type_id','label' => 'тип','filter'=> $searchModel->getTypeList(),'value' => 'typeName'],

    ],
]); ?>
<?php Pjax::end();?>
<?php BoxWidget::end();?>
