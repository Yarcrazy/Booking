<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Rooms;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Query;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    public function actionIndex() {
        $room = Rooms::findOne(1);
        var_dump($room->isAvailable('2022-04-15', '2022-04-16'));
    }
}
