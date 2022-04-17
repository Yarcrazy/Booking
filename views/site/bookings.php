<?php
/** @var yii\web\View $this */

/** @var \yii\data\ActiveDataProvider $dataProvider */

use yii\grid\GridView;

echo GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'room_id',
                'label' => 'Room number'
            ],
            [
                'attribute' => 'room_id',
                'value' => function($model) {
                    /**
                     * @var $model \app\models\Booking
                     */
                    return $model->room->type->name;
                },
                'label' => 'Room type'
            ],
            [
                'attribute' => 'from_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'to_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            'username',
            'email'
        ]
    ]
);