<?php

use yii\db\Migration;

/**
 * Class m180321_150542_tagToNote
 */
class m180321_150542_tagToNote extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('link',[
           'id'=>$this->bigPrimaryKey(),
           'note_id'=>$this->integer(),
           'tag_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('link');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180321_150542_tagToNote cannot be reverted.\n";

        return false;
    }
    */
}
