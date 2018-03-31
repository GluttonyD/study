<?php

use yii\db\Migration;

/**
 * Class m180318_173134_table
 */
class m180318_173134_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('table',[
            'id'=>$this->bigPrimaryKey(),
            'col_id'=>$this->integer(),
            'row_id'=>$this->integer(),
            'data'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('table');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180318_173134_table cannot be reverted.\n";

        return false;
    }
    */
}
