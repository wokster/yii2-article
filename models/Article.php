<?php

namespace wokster\article\models;

use wokster\behaviors\ImageUploadBehavior;
use wokster\behaviors\StatusBehavior;
use wokster\tags\TagsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $text
 * @property integer $status_id
 * @property string $image
 * @property integer $date_create
 * @property integer $type_id
 * @property integer $date_start
 * @property integer $date_finish
 */
class Article extends \yii\db\ActiveRecord
{
    public $file;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
            'status' => [
              'class' => StatusBehavior::className(),
              'status_value' => $this->status_id,
               'statusList' => Yii::$app->modules['article']->status_list,
            ],
            'image' => [
                'class' => ImageUploadBehavior::className(),
                'attribute' => 'image',
                'random_name' => 'true',
                'image_path' => Yii::$app->modules['article']->imagePath,
                'image_url' => Yii::$app->modules['article']->imageUrl,
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_create',
                'updatedAtAttribute' => false,
            ],
            'seo' => [
                'class' => \wokster\seomodule\SeoBehavior::className(),
            ],
            'tags' => [
                'class' => TagsBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['date_start', 'date_finish'], 'required', 'when' => function($model) {
                return $model->type_id == \wokster\article\Article::TYPE_SALE;
            }],
            [['text'], 'string'],
            [['status_id', 'date_create', 'type_id', 'date_start', 'date_finish'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 100],
            [['url'], 'unique'],
            [['url'], 'match', 'pattern' => '/^[a-z0-9_-]+$/', 'message' => 'Недопустимые символы в url'],
            [['status_id'], 'default', 'value'=>0],
            ['file','image'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'заглавие',
            'url' => 'ЧПУ',
            'text' => 'контент',
            'status_id' => 'статус',
            'image' => 'картинка',
            'date_create' => 'дата публикации',
            'type_id' => 'тип',
            'Status' => 'статус',
            'date_start' => 'дата начала',
            'date_finish' => 'дата окончания'
        ];
    }

    /**
     * @return mixed
     */
    public static function getTypeList(){
        return Yii::$app->modules['article']->type_list;
    }

    /**
     * @return string
     */
    public function getTypeName(){
        $list = self::getTypeList();
        return (isset($list[$this->type_id]))?$list[$this->type_id]:'';
    }

    /**
     * @return string
     */
    public function getShortText(){
        return StringHelper::truncateWords(strip_tags($this->text),50);
    }
}
