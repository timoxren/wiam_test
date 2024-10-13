<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m241004_001246_create_users
 */
class m241004_001246_create_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
        ]);

        $this->createTable('requests', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_BIGINT . ' NOT NULL',
            'amount' => Schema::TYPE_INTEGER . ' NOT NULL',
            'delay' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('requests');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241004_001246_create_users cannot be reverted.\n";

        return false;
    }
    */
}
