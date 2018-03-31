<?php

use yii\db\Migration;

/**
 * Class m180331_164241_add_object_type_col
 */
class m180331_164241_add_object_type_col extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('like','object_type',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('like','object_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180331_164241_add_object_type_col cannot be reverted.\n";

        return false;
    }
    */
}
