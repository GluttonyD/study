<?php

use yii\db\Migration;

/**
 * Class m180319_231351_addCol
 */
class m180319_231351_addCol extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('table','table_id',$this->bigInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('table','table_id');
}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180319_231351_addCol cannot be reverted.\n";

        return false;
    }
    */
}
