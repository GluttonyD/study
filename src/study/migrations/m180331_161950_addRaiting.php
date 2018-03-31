<?php

use yii\db\Migration;

/**
 * Class m180331_161950_addRaiting
 */
class m180331_161950_addRaiting extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('note','rate',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('note','rate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180331_161950_addRaiting cannot be reverted.\n";

        return false;
    }
    */
}
