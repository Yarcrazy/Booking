<?php

/** @var yii\web\View $this */
/** @var AvaliableRoomsForm $model */
/** @var array $availableRoomsByTypes */

use app\forms\AvaliableRoomsForm;
use app\models\Rooms;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
$this->title = 'Available rooms';
$form = ActiveForm::begin(
    [
        'tooltipStyleFeedback' => true,
    ]
);
echo DatePicker::widget(
    [
        'model' => $model,
        'attribute' => 'from_date',
        'attribute2' => 'to_date',
        'options' => ['placeholder' => 'Start date'],
        'options2' => ['placeholder' => 'End date'],
        'type' => DatePicker::TYPE_RANGE,
        'form' => $form,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]
);
echo \yii\helpers\Html::button('Submit', ['type' => 'submit', 'style' => ['margin-top' => '20px']]);
ActiveForm::end();

if (count($availableRoomsByTypes) === 0) {
    echo 'No avaliable rooms!';
} else {
    echo 'Avaliable rooms:';
}
foreach ($availableRoomsByTypes as $item) {
    echo "<div>Category '" . $item['name'] . "' - " . $item['rooms_count'];
}
