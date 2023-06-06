<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post2}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user3}}`
 */
class m230601_111002_create_post2_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post2}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'body' => $this->text(),
            'created_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-post2-created_by}}',
            '{{%post2}}',
            'created_by'
        );

        // add foreign key for table `{{%user3}}`
        $this->addForeignKey(
            '{{%fk-post2-created_by}}',
            '{{%post2}}',
            'created_by',
            '{{%user3}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user3}}`
        $this->dropForeignKey(
            '{{%fk-post2-created_by}}',
            '{{%post2}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-post2-created_by}}',
            '{{%post2}}'
        );

        $this->dropTable('{{%post2}}');
    }
}
