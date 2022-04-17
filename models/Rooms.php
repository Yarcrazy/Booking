<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rooms".
 *
 * @property int $id
 * @property int $type_id
 *
 * @property Booking[] $bookings
 * @property RoomTypes $type
 */
class Rooms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id'], 'required'],
            [['type_id'], 'default', 'value' => null],
            [['type_id'], 'integer'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoomTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['room_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(RoomTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @param $from_date
     * @param $to_date
     * @return bool возвращает доступен ли номер
     */
    public function isAvailable($from_date, $to_date) {
        foreach ($this->bookings as $booking) {
            if ($from_date < date('Y-m-d', strtotime($booking->to_date)) && $to_date > date('Y-m-d', strtotime($booking->from_date))) return false;
        }
        return true;
    }
}
