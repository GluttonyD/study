<?php

use yii\db\Migration;

/**
 * Class m180321_150414_tag_table
 */
class m180321_150414_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags',[
            'id'=>$this->bigPrimaryKey(),
            'tag'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tags');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180321_150414_tag_table cannot be reverted.\n";

        return false;
    }
    */
}
