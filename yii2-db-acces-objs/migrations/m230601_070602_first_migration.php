<?php

use yii\db\Migration;

/**
 * Class m230601_070602_first_migration
 */
class m230601_070602_first_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user2', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'status' =>$this->boolean( ),
            'create_at' => $this->timestamp()
        ]);

        $this->addColumn('user2', 'email', $this->string(512)->notNull() );

        $this->createTable('post1', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'userId' => $this->integer(),
        ]);

        $this->addForeignKey('FK_post_user', 'post1', 'userId', 'user2', 'id' );

        $this->insert('user2', [
            'username' => 'John',
            'email' => 'smt@test.com',
            'status' => 1,
            'create_at' => time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230601_070602_first_migration cannot be reverted.\n";

        return false;
    }

}
