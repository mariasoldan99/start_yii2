<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%user3}}`.
 */
class m230601_082940_drop_email_column_from_user3_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%user3}}', 'email');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%user3}}', 'email', $this->String(255));
    }
}
