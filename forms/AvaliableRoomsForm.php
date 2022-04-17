<?php
namespace app\forms;

use app\models\Rooms;

class AvaliableRoomsForm extends \yii\base\Model
{
    public $from_date;
    public $to_date;

    public function rules() {
        return [
            [['from_date', 'to_date'], 'required'],
            ['from_date', function($attribute) {
                if ($this->$attribute < date('Y-m-d')) {
                    $this->addError('from_date', 'Take date from current!');
                }
            }],
            ['to_date', function($attribute) {
                if ($this->$attribute < date('Y-m-d', strtotime($this->from_date . ' +1 day'))) {
                    $this->addError('to_date', 'Interval must be 1 day minimum!');
                }
            }]
        ];
    }

    /**
     * @return array возвращает id доступных номеров
     */
    public function getAvailableRoomsIds() {
        $rooms = Rooms::find()->all();
        $availableRoomsIds = [];
        foreach ($rooms as $room) {
            /**
             * @var Rooms $room
             */
            if ($room->isAvailable($this->from_date, $this->to_date)) $availableRoomsIds[] = $room->id;
        }
        return $availableRoomsIds;
    }
}