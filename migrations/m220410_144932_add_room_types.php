<?php

use yii\db\Migration;

/**
 * Class m220410_144932_add_room_types
 */
class m220410_144932_add_room_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%room_types}}', ['name'], [
            ['Одноместный'],
            ['Двуместный'],
            ['Люкс'],
            ['Де-Люк']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220410_144932_add_room_types cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220410_144932_add_room_types cannot be reverted.\n";

        return false;
    }
    */
}
