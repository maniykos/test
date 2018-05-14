<?php

use yii\db\Migration;

/**
 * Class m180514_182900_tb_managers
 */
class m180514_182900_tb_managers extends Migration
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

        $this->createTable('{{%managers}}', [
            'id'            => $this->primaryKey(),
            'first_name'    => $this->string()->notNull(),
            'second_name'   => $this->string()->notNull(),
            'salary'        => $this->decimal(10, 2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('managers');
        echo "m180514_182900_tb_managers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_182900_tb_managers cannot be reverted.\n";

        return false;
    }
    */
}
