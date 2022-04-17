<?php

use app\models\RoomTypes;
use yii\db\Migration;

/**
 * Class m220410_145505_add_rooms
 */
class m220410_145505_add_rooms extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%rooms}}', ['type_id'], [
            [RoomTypes::ONE_BED],
            [RoomTypes::ONE_BED],
            [RoomTypes::TWO_BED],
            [RoomTypes::TWO_BED],
            [RoomTypes::TWO_BED],
            [RoomTypes::TWO_BED],
            [RoomTypes::LUX],
            [RoomTypes::LUX],
            [RoomTypes::LUX],
            [RoomTypes::DE_LUX],
            [RoomTypes::DE_LUX],
            [RoomTypes::DE_LUX],
            [RoomTypes::DE_LUX],
            [RoomTypes::DE_LUX],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220410_145505_add_rooms cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220410_145505_add_rooms cannot be reverted.\n";

        return false;
    }
    */
}
