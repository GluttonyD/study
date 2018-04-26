<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 10.03.2018
 * Time: 23:51
 */

namespace app\controllers;


use app\models\RandomForm;
use Symfony\Component\BrowserKit\Cookie;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionRand()
    {
        $rand = new RandomForm();
        echo $rand->rand(0,10);
    }
}