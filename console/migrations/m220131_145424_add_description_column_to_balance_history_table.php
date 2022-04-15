<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%balance_history}}`.
 */
class m220131_145424_add_description_column_to_balance_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%balance_history}}', 'description', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%balance_history}}', 'description');
    }
}
