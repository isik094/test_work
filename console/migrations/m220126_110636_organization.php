<?php

use yii\db\Migration;

/**
 * Class m220126_110636_organization
 */
class m220126_110636_organization extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organization}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull()->unique(),
            'description' => $this->string(60)->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'ogrn' => $this->string()->notNull()->unique(),
            'inn' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%organization}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220126_110636_organization cannot be reverted.\n";

        return false;
    }
    */
}
