<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m190227_135251_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(150)->notNull()->unique(),
            'password_hash' => $this->string(300)->notNull(),
            'token' => $this->string(300),
            'username'=> $this->string(150),
            'date_created'=> $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
