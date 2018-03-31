<?php

use yii\db\Migration;

/**
 * Class m180327_111608_comment
 */
class m180327_111608_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment',[
            'id'=>$this->bigPrimaryKey(),
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
        $this->dropTable('comment');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180327_111608_comment cannot be reverted.\n";

        return false;
    }
    */
}
