<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use \dosamigos\fileinput\FileInput;

/* @var $this yii\web\View */
/* @var $model wokster\article\models\Article */
/* @var $form yii\widgets\ActiveForm */

if($model->hasErrors()):
  \wokster\ltewidgets\BoxWidget::begin([
      'solid'=>true,
      'color'=>'danger',
      'title'=>'Ошибки валидации',
      'close'=> true,
  ]);
  $error_data = $model->firstErrors;
  echo \yii\widgets\DetailView::widget([
      'model'=>$error_data,
      'attributes'=>array_keys($error_data)
  ]);
  \wokster\ltewidgets\BoxWidget::end();
endif;
?>

<div class="article-form">
    <?php $form = ActiveForm::begin([
      'options' => ['enctype'=>'multipart/form-data'],
      'enableClientValidation' => false
    ]); ?>

          <?= $form->field($model, 'title', ['addon' => ['prepend' => ['content' => '<i class="fa fa-pencil"></i>']],'options'=>['class'=>'col-xs-12 col-md-6']])->textInput(['maxlength' => true]) ?>

	        <?=  $form->field($model, 'url', ['addon' => ['prepend' => ['content' => '<i class="fa fa-globe"></i>']],'options'=>['class'=>'col-xs-12 col-md-6']])->widget(\wokster\behaviors\TranslitWidget::className())
 ?>

	        <?=  $form->field($model, 'text',['options'=>['class'=>'col-xs-12']])->widget(\vova07\imperavi\Widget::className(),[
              'settings' => [
                  'lang' => 'ru',
                  'minHeight' => 200,
                  'pastePlainText' => true,
                  'imageUpload' => \yii\helpers\Url::toRoute(['/article/article/image-upload']),
                  'imageManagerJson' => \yii\helpers\Url::toRoute(['/article/article/images-get']),
                  'replaceDivs' => false,
                  'formattingAdd' => [
                      [
                          'tag' => 'p',
                          'title' => 'text-success',
                          'class' => 'text-success'
                      ],
                      [
                          'tag' => 'p',
                          'title' => 'text-danger',
                          'class' => 'text-danger'
                      ],
                  ],
                  'plugins' => [
                      'fullscreen',
                      'table',
                      'imagemanager',
                      'fontcolor',
                      'fontsize',
                      'video'
                  ]
              ]
          ])
 ?>
  <div class="row">
  <div class="col-xs-8">
    <?=  $form->field($model, 'status_id',['options'=>['class'=>'col-xs-12']])->dropDownList(Yii::$app->modules['article']->status_list)
    ?>

    <?= $form->field($model, 'type_id', ['addon' => ['prepend' => ['content' => '<i class="fa fa-pencil"></i>']],'options'=>['class'=>'col-xs-12']])->dropDownList(Yii::$app->modules['article']->type_list) ?>

    <div class="<?= ($model->type_id == \wokster\article\Article::TYPE_PAGE)?' hidden':''?>" id="start-date-div">
      <?= $form->field($model, 'date_start', ['options'=>['class'=>'col-xs-12']])->widget(\kartik\datecontrol\DateControl::className(),[]) ?>
    </div>

    <div class="<?= ($model->type_id == \wokster\article\Article::TYPE_SALE)?'':' hidden'?>" id="sale-date-div">
      <?= $form->field($model, 'date_finish', ['options'=>['class'=>'col-xs-12']])->widget(\kartik\datecontrol\DateControl::className(),[]) ?>
    </div>

    <?= $form->field($model, 'new_tags', ['addon' => ['prepend' => ['content' => '<i class="fa fa-pencil"></i>']],'options'=>['class'=>'col-xs-12']])->widget(\wokster\tags\TagsInputWidget::className()) ?>
  </div>
  <div class="col-xs-4">
    <?= $form->field($model, 'file', ['options'=>['class'=>'col-xs-12']])->label(false)->widget(FileInput::className(),[
        'attribute' => 'image', // image is the attribute
      // using STYLE_IMAGE allows me to display an image. Cool to display previously
      // uploaded images
        'thumbnail' => '<img src="'.$model->getImage().'" />',
        'style' => FileInput::STYLE_IMAGE
    ]);?>
  </div>
  </div>
  <?= \wokster\seomodule\SeoFormWidget::widget(['model'=>$model,'form'=>$form]);?>
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' =>'btn btn-success']) ?>
      </div>
    </div>
  </div>
  <?php ActiveForm::end(); ?>
</div>
<?php $this->registerJs("
  $('#article-type_id').on('change',function(){
  var type = $(this).val();
    if(type == ".\wokster\article\Article::TYPE_SALE."){
      $('#sale-date-div').removeClass('hidden');
      $('#start-date-div').removeClass('hidden');
    }else if(type == ".\wokster\article\Article::TYPE_NEWS."){
      $('#sale-date-div').addClass('hidden');
      $('#start-date-div').removeClass('hidden');
    }else{
      $('#sale-date-div').addClass('hidden');
      $('#start-date-div').addClass('hidden');
    }
  });
");
