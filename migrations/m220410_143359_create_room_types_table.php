<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%room_types}}`.
 */
class m220410_143359_create_room_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%room_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%room_types}}');
    }
}
