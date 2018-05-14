<?php

use yii\db\Migration;

/**
 * Class m180514_193959_tb_managers_data
 */
class m180514_193959_tb_managers_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%managers}}', [
            'id'       => 1,
            'first_name' => 'Браун',
            'second_name' => 'Хельга',
            'salary'   => 20000,
        ]);
        $this->insert('{{%managers}}', [
            'id'       => 2,
            'first_name' => 'Обама',
            'second_name' => 'Барак',
            'salary'   => 30000,
        ]);
        $this->insert('{{%managers}}', [
            'id'       => 3,
            'first_name' => 'Козлов',
            'second_name' => 'Денис',
            'salary'   => 40000,
        ]);


        $this->insert('{{%managers_bonus}}', [
            'id'    => 1,
            'name'  => 'Начальная',
            'max'   => 100,
        ]);
        $this->insert('{{%managers_bonus}}', [
            'id'    => 2,
            'name' => 'Средняя',
            'max'   => 200,
        ]);
        $this->insert('{{%managers_bonus}}', [
            'id'    => 3,
            'name' => 'Высшая',
            'max'   => 300,
        ]);


        //manager 1
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('1.01.2015', 1); }
        for ($i = 0; $i < 40; $i++) { $this->createManagersCall('2.01.2015', 1); }
        for ($i = 0; $i < 40; $i++) { $this->createManagersCall('3.01.2015', 1); }
        for ($i = 0; $i < 30; $i++) { $this->createManagersCall('4.01.2015', 1); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('5.01.2015', 1); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('8.01.2015', 1); }
        for ($i = 0; $i < 20; $i++) { $this->createManagersCall('9.01.2015', 1); }
        for ($i = 0; $i < 30; $i++) { $this->createManagersCall('10.01.2015', 1); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('11.01.2015', 1); }
        for ($i = 0; $i < 20; $i++) { $this->createManagersCall('12.01.2015', 1); }

        //manager 2
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('1.01.2015', 2); }
        for ($i = 0; $i < 20; $i++) { $this->createManagersCall('2.01.2015', 2); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('3.01.2015', 2); }
        for ($i = 0; $i < 30; $i++) { $this->createManagersCall('4.01.2015', 2); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('5.01.2015', 2); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('8.01.2015', 2); }

        //manager 3
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('1.01.2015', 3); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('2.01.2015', 3); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('3.01.2015', 3); }
        for ($i = 0; $i < 30; $i++) { $this->createManagersCall('4.01.2015', 3); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('5.01.2015', 3); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('8.01.2015', 3); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('9.01.2015', 3); }
        for ($i = 0; $i < 30; $i++) { $this->createManagersCall('10.01.2015', 3); }
        for ($i = 0; $i < 10; $i++) { $this->createManagersCall('11.01.2015', 3); }
        for ($i = 0; $i < 20; $i++) { $this->createManagersCall('12.01.2015', 3); }

    }

    public function createManagersCall($date, $manager)
    {
        $table = '{{%managers_call}}';
        $date = strtotime($date);
        $this->insert($table, [
            'manager_id' => $manager,
            'date'       => $date,
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180514_193959_tb_managers_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_193959_tb_managers_data cannot be reverted.\n";

        return false;
    }
    */
}
