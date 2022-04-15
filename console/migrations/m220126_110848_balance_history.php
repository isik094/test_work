<?php

use yii\db\Migration;

/**
 * Class m220126_110848_balance_history
 */
class m220126_110848_balance_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%balance_history}}', [
            'id' => $this->primaryKey(),
            'organization_id' => $this->integer()->notNull(),
            'amount' => $this->decimal(12, 2)->notNull(),

            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'balance-history-organization_id',
            'balance_history',
            'organization_id',
            'organization',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%balance_history}}');

        $this->dropForeignKey(
            'balance-history-organization_id',
            'balance_history',
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220126_110848_balance_history cannot be reverted.\n";

        return false;
    }
    */
}
