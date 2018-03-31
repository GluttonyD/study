<?php

use yii\db\Migration;

/**
 * Class m180329_120639_change_col_com
 */
class m180329_120639_change_col_com extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment','note_id',$this->bigInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('comment','note_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180329_120639_change_col_com cannot be reverted.\n";

        return false;
    }
    */
}
