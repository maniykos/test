<?php
/**
 *  Class UrlShortenerController
 *  @author: Lezhnev (lezhnevod@gmail.com)
 *
 */
use yii\db\Migration;
use yii\db\Schema;

class m170823_085034_url_shortener extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170823_085030_url_shortener cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%url_shortener}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER,
            'long_url' => $this->string(255)->notNull()->unique(),
            'short_url' => $this->string(255)->notNull()->unique(),
            'count_activations' => Schema::TYPE_INTEGER . ' DEFAULT 0',
            'publish_date' => Schema::TYPE_DATE
        ], $tableOptions);

        $this->addForeignKey(
            'FK_url_shortener', '{{%url_shortener}}', 'user_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%url_shortener}}');
    }
}
