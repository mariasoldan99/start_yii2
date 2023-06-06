<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user3}}`.
 */
class m230601_082251_create_user3_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user3}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(55)->notNull()->unique(),
            'email' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user3}}');
    }
}
