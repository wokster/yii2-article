<?php

namespace wokster\article;

use yii\helpers\Url;

class Article extends \yii\base\Module
{
    const TYPE_PAGE = 0;
    const TYPE_NEWS = 1;
    const TYPE_SALE = 2;
    public $controllerNamespace = 'wokster\article\controllers';
    public $defaultRoute = 'article';
    public $type_list = [];
    public $status_list = [];
    public $upload_folder_name = 'article';
    public $upload_path_alias = '@upload';
    public $redactor_upload_path_alias = '@upload/redactor';
    public $img_url;
    public $redactor_img_url;

    public function init()
    {
        parent::init();
    }
    /**
     * @return string
     */
    public function getImagePath(){
        return \Yii::getAlias($this->upload_path_alias).'/'.$this->upload_folder_name;
    }

    /*
     * @return string
     */
    public function getRedactorPath(){
        return \Yii::getAlias($this->redactor_upload_path_alias).'/'.$this->upload_folder_name;
    }

    /**
     * @return string
     */
    public function getImageUrl(){
        return (empty($this->img_url))?str_replace('admin.','',Url::home(true)).'upload/'.$this->upload_folder_name:$this->img_url;
    }

    /**
     * @return string
     */
    public function getRedactorImageUrl(){
        return (empty($this->redactor_img_url))?str_replace('admin.','',Url::home(true)).'upload/redactor/'.$this->upload_folder_name.'/':$this->redactor_img_url;
    }

    /**
     * @return string
     */
    public function getAllRedactorImageUrl(){
        return (empty($this->redactor_img_url))?str_replace('admin.','',Url::home(true)).'upload/redactor/':$this->redactor_img_url;
    }
}
