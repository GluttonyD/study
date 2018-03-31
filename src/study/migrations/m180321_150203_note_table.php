<?php

use yii\db\Migration;

/**
 * Class m180321_150203_note_table
 */
class m180321_150203_note_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('notes',[
           'id'=>$this->bigPrimaryKey(),
           'header'=>$this->string(),
           'text'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('notes');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180321_150203_note_table cannot be reverted.\n";

        return false;
    }
    */
}
