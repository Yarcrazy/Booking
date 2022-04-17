<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rooms}}`.
 */
class m220410_143505_create_rooms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%rooms}}',
            [
                'id' => $this->primaryKey(),
                'type_id' => $this->integer()->notNull(),
            ]
        );
        $this->addForeignKey('fk_type_rooms', '{{%rooms}}', 'type_id', '{{%room_types}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_type_rooms', '{{%rooms}}');
        $this->dropTable('{{%rooms}}');
    }
}
