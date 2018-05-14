<?php

use yii\db\Migration;

/**
 * Class m180514_191614_tb_managers_call_arxive
 */
class m180514_191614_tb_managers_call_arxive extends Migration
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

        $this->createTable('{{%managers_call_arxive}}', [
            'id'            => $this->primaryKey(),
            'manager_id'    => $this->integer(),
            'count'         => $this->integer()->notNull(),
            'date'          => $this->integer(),
        ]);

        $this->createIndex('idx_manager_managers_call_arxive', '{{%managers_call_arxive}}', 'manager_id');
        $this->addForeignKey('fk_managers_managers_call_arxive', '{{%managers_call_arxive}}', 'manager_id', '{{%managers}}', 'id','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_managers_managers_call_arxive', '{{%managers_call_arxive}}');
        $this->dropTable('managers_call_arxive');
        echo "m180514_191614_tb_managers_call_arxive cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_191614_tb_managers_call_arxive cannot be reverted.\n";

        return false;
    }
    */
}
