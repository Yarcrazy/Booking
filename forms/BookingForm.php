<?php
namespace app\forms;

use app\models\Booking;
use app\models\Rooms;

class BookingForm extends Booking
{
    public $from_date;
    public $to_date;
    public $room_id;
    public $username;
    public $email;

    public function rules() {
        return [
            [['from_date', 'to_date'], 'required'],
            ['email', 'email'],
            ['username', 'string'],
            ['room_id', 'integer'],
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

    public function saveForm() {
        if ($this->validate()) {
            $booking = new Booking();
            $booking->room_id = $this->room_id;
            $booking->from_date = $this->from_date;
            $booking->to_date = $this->to_date;
            $booking->username = $this->username;
            $booking->email = $this->email;
            return $booking->save();
        }
        return false;
    }

}