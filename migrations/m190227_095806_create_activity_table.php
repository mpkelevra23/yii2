<?php

use yii\db\Migration;

/**
 * Handles the creation of table `activity`.
 */
class m190227_095806_create_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey(),
            'title' => $this->string(150)->notNull(),
            'description' => $this->text(),
            'date_start' => $this->dateTime()->notNull(),
            'date_end' => $this->dateTime(),
            'notice' => $this->boolean()->notNull()->defaultValue(0),
            'is_blocked' => $this->boolean()->notNull()->defaultValue(0),
            'repeat' => $this->boolean()->notNull()->defaultValue(0),
            'date_created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
    }
}
