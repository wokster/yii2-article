<?php

namespace wokster\article;

class Article extends \yii\base\Module
{
    const TYPE_PAGE = 0;
    const TYPE_NEWS = 1;
    const TYPE_SALE = 2;
    public $controllerNamespace = 'wokster\article\controllers';
    public $defaultRoute = 'article';
    public $type_list = [];
    public $status_list = [];

    public function init()
    {
        parent::init();
    }
}
