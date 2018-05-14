<?php

use yii\db\Migration;

/**
 * Class m180514_183201_tb_managers_bonus
 */
class m180514_183201_tb_managers_bonus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%managers_bonus}}', [
            'id'    => $this->primaryKey(),
            'name'  => $this->string(),
            'max'   => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('managers_bonus');
        echo "m180514_183201_tb_managers_bonus cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_183201_tb_managers_bonus cannot be reverted.\n";

        return false;
    }
    */
}
