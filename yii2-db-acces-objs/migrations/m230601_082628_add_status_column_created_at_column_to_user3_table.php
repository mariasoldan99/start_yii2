<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user3}}`.
 */
class m230601_082628_add_status_column_created_at_column_to_user3_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user3}}', 'status', $this->boolean()->defaultValue(1));
        $this->addColumn('{{%user3}}', 'created_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user3}}', 'status');
        $this->dropColumn('{{%user3}}', 'created_at');
    }
}
