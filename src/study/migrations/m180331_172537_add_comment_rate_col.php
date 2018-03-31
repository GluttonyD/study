<?php

use yii\db\Migration;

/**
 * Class m180331_172537_add_comment_rate_col
 */
class m180331_172537_add_comment_rate_col extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment','rate',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('comment','rate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180331_172537_add_comment_rate_col cannot be reverted.\n";

        return false;
    }
    */
}
