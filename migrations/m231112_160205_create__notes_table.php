<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%_notes}}`.
 */
class m231112_160205_create__notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notes}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(1024),
            'body' => $this->text(),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-notes-created_by}}',
            '{{%notes}}',
            'created_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-notes-created_by}}',
            '{{%notes}}',
            'created_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-notes-created_by}}',
            '{{%notes}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-notes-created_by}}',
            '{{%notes}}'
        );

        $this->dropTable('{{%notes}}');
    }
}
