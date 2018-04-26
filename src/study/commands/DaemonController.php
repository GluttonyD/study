<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 15.04.2018
 * Time: 14:47
 */

namespace app\commands;


use app\models\Comment;
use yii\console\Controller;

class DaemonController extends Controller
{
    public function actionTest(){
        Comment::find()->one()->delete();
    }
}