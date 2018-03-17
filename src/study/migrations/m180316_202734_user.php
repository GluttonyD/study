<?php

use yii\db\Migration;

/**
 * Class m180316_202734_user
 */
class m180316_202734_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',[
            'id'=>$this->bigPrimaryKey(),
            'nickname'=>$this->string(),
            'e-mail'=>$this->string(),
            'password'=>$this->string()
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180316_202734_user cannot be reverted.\n";

        return false;
    }
    */
}
