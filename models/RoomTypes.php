<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room_types".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property Rooms[] $rooms
 */
class RoomTypes extends \yii\db\ActiveRecord
{
    const ONE_BED = 1;
    const TWO_BED = 2;
    const LUX = 3;
    const DE_LUX = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Rooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Rooms::className(), ['type_id' => 'id']);
    }
}
