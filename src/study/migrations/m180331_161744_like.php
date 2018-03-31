<?php

use yii\db\Migration;

/**
 * Class m180331_161744_like
 */
class m180331_161744_like extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('like',[
            'id'=>$this->bigPrimaryKey(),
            'user_id'=>$this->bigInteger(),
            'object_id'=>$this->bigInteger(),
            'mark'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('like');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180331_161744_like cannot be reverted.\n";

        return false;
    }
    */
}
