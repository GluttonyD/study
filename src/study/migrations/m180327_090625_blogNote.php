<?php

use yii\db\Migration;

/**
 * Class m180327_090625_blogNote
 */
class m180327_090625_blogNote extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('note',[
            'id'=>$this->bigPrimaryKey(),
            'header'=>$this->string(),
            'text'=>$this->string(),
            'time'=>$this->dateTime(),
            'author_id'=>$this->bigInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('note');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180327_090625_blogNote cannot be reverted.\n";

        return false;
    }
    */
}
