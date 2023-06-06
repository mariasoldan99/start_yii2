<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user3_post2}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user3}}`
 * - `{{%post2}}`
 */
class m230601_111403_create_junction_table_for_user3_and_post2_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user3_post2}}', [
            'user3_id' => $this->integer(),
            'post2_id' => $this->integer(),
            'created_at' => $this->integer(),
            'PRIMARY KEY(user3_id, post2_id)',
        ]);

        // creates index for column `user3_id`
        $this->createIndex(
            '{{%idx-user3_post2-user3_id}}',
            '{{%user3_post2}}',
            'user3_id'
        );

        // add foreign key for table `{{%user3}}`
        $this->addForeignKey(
            '{{%fk-user3_post2-user3_id}}',
            '{{%user3_post2}}',
            'user3_id',
            '{{%user3}}',
            'id',
            'CASCADE'
        );

        // creates index for column `post2_id`
        $this->createIndex(
            '{{%idx-user3_post2-post2_id}}',
            '{{%user3_post2}}',
            'post2_id'
        );

        // add foreign key for table `{{%post2}}`
        $this->addForeignKey(
            '{{%fk-user3_post2-post2_id}}',
            '{{%user3_post2}}',
            'post2_id',
            '{{%post2}}',
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
            '{{%fk-user3_post2-user3_id}}',
            '{{%user3_post2}}'
        );

        // drops index for column `user3_id`
        $this->dropIndex(
            '{{%idx-user3_post2-user3_id}}',
            '{{%user3_post2}}'
        );

        // drops foreign key for table `{{%post2}}`
        $this->dropForeignKey(
            '{{%fk-user3_post2-post2_id}}',
            '{{%user3_post2}}'
        );

        // drops index for column `post2_id`
        $this->dropIndex(
            '{{%idx-user3_post2-post2_id}}',
            '{{%user3_post2}}'
        );

        $this->dropTable('{{%user3_post2}}');
    }
}
