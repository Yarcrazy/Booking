<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property int $room_id
 * @property string $from_date
 * @property string $to_date
 * @property string $username
 * @property string $email
 *
 * @property Rooms $room
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'from_date', 'to_date', 'username', 'email'], 'required'],
            [['room_id'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['username', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rooms::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'username' => 'Username',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Rooms::className(), ['id' => 'room_id']);
    }
}
