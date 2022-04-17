<?php

/** @var yii\web\View $this */
/** @var BookingForm $model */

use app\forms\BookingForm;
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
echo '<br>';
echo $form->field($model, 'room_id')->dropDownList(
    Rooms::find()->select('id')->indexBy('id')->column()
)->label('Room');
echo $form->field($model, 'username')->textInput();
echo $form->field($model, 'email')->textInput();
echo \yii\helpers\Html::button('Make booking', ['type' => 'submit', 'style' => ['margin-top' => '20px']]);
ActiveForm::end();