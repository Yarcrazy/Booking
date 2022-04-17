<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%booking}}`.
 */
class m220410_143523_create_booking_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%booking}}', [
            'id' => $this->primaryKey(),
            'room_id' => $this->integer()->notNull(),
            'from_date' => $this->timestamp()->notNull(),
            'to_date' => $this->timestamp()->notNull(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('fk_room_booking', '{{%booking}}', 'room_id', '{{%rooms}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_room_booking', '{{%booking}}');
        $this->dropTable('{{%booking}}');
    }
}
