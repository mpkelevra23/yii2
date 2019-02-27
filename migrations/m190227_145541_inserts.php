<?php

use yii\db\Migration;

/**
 * Class m190227_145541_inserts
 */
class m190227_145541_inserts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',
            [
                'id' => 1,
                'email' => 'user_1@email.com',
                'password_hash' => '123456',
                'username' => 'user_1'
            ]
        );

        $this->insert('users',
            [
                'id' => 2,
                'email' => 'user_2@email.com',
                'password_hash' => '123456',
                'username' => 'user_2'
            ]
        );

        $this->insert('users',
            [
                'id' => 3,
                'email' => 'user_3@email.com',
                'password_hash' => '123456',
                'username' => 'user_3'
            ]
        );

        $this->batchInsert('activity',
            ['title', 'date_start', 'user_id', 'notice'],
            [
                ['Заголовок 1_1', date('Y-m-d H:i:s'), 1, 0],
                ['Заголовок 1_2', date('1990-01-01 12:00:00'), 1, 1],
                ['Заголовок 2_1', date('Y-m-d H:i:s'), 2, 0],
                ['Заголовок 2_2', date('1990-01-01 12:00:00'), 2, 1],
                ['Заголовок 3_1', date('Y-m-d H:i:s'), 3, 0],
                ['Заголовок 3_2', date('1990-01-01 12:00:00'), 3, 1],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190227_145541_inserts cannot be reverted.\n";

        return false;
    }
    */
}
