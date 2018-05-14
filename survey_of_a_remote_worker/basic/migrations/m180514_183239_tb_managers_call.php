<?php

use yii\db\Migration;

/**
 * Class m180514_183239_tb_managers_call
 */
class m180514_183239_tb_managers_call extends Migration
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

        $this->createTable('{{%managers_call}}', [
            'id'            => $this->primaryKey(),
            'date'          => $this->integer()->notNull(),
            'manager_id'     => $this->integer(),
        ]);

        $this->createIndex('idx_manager_managers_call', '{{%managers_call}}', 'manager_id');
        $this->addForeignKey('fk_managers_managers_call', '{{%managers_call}}', 'manager_id', '{{%managers}}', 'id','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_managers_managers_call', '{{%managers_call}}');
        $this->dropTable('managers_call');
        echo "m180514_183239_tb_managers_call cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_183239_tb_managers_call cannot be reverted.\n";

        return false;
    }
    */
}
