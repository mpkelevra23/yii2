<?php

use yii\db\Migration;

/**
 * Class m190227_144102_add_users_activity_FK
 */
class m190227_144102_add_users_activity_FK extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('users_activity_FK',
            'activity', 'user_id',
            'users', 'id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('users_activity_FK', 'activity');
        $this->dropIndex('users_activity_FK', 'activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190227_144102_add_users_activity_FK cannot be reverted.\n";

        return false;
    }
    */
}
