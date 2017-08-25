<?php

use yii\db\Migration;

class m170504_124749_article extends Migration
{
    public function safeUp()
    {
        $this->createTable('article',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(255)->notNull(),
                'url' => $this->string(255)->notNull(),
                'redirect' => $this->string(255),
                'text' => $this->text(),
                'status_id' => $this->smallInteger(1)->defaultValue(0),
                'image' => $this->string(255),
                'type_id' => $this->smallInteger(2)->defaultValue(0),
                'date_create' => $this->integer(),
                'date_start' => $this->integer(),
                'date_finish' => $this->integer(),
            ]
        );
        $this->createIndex(
            'article-url',
            'article',
            'url',
            true
        );
        $this->createIndex(
            'article-type_id',
            'article',
            'type_id'
        );
        $this->createIndex(
            'article_status_id',
            'article',
            'status_id'
        );
        $this->createIndex(
            'article-date_create',
            'article',
            'date_create'
        );
        $this->createIndex(
            'article-date_start',
            'article',
            'date_start'
        );
        $this->createIndex(
            'article-date_finish',
            'article',
            'date_finish'
        );
    }

    public function safeDown()
    {
        return ($this->dropTable('article'))?true:false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170504_124749_pages cannot be reverted.\n";

        return false;
    }
    */
}
