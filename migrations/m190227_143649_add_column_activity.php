<?php

use yii\db\Migration;

/**
 * Class m190227_143649_add_column_activity
 */
class m190227_143649_add_column_activity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'user_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190227_143649_add_column_activity cannot be reverted.\n";

        return false;
    }
    */
}
