<?php

use yii\db\Migration;

/**
 * Class m180327_111650_comment_to_note
 */
class m180327_111650_comment_to_note extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment_to_note',[
            'id'=>$this->bigPrimaryKey(),
            'note_id'=>$this->bigInteger(),
            'comment_id'=>$this->bigInteger()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comment_to_note');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180327_111650_comment_to_note cannot be reverted.\n";

        return false;
    }
    */
}
