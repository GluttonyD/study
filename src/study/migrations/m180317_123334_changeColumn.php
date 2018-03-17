<?php

use yii\db\Migration;

/**
 * Class m180317_123334_changeColumn
 */
class m180317_123334_changeColumn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','e_mail',$this->string());
        $this->dropColumn('user','e-mail');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      return null;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180317_123334_changeColumn cannot be reverted.\n";

        return false;
    }
    */
}
