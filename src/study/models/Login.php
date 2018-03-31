<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 17.03.2018
 * Time: 17:29
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class Login extends Model
{
    public $nickname;
    public $password;

    public function rules()
    {
        return [
            [['nickname','password'],'string'],
            [['nickname','password'],'required']
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            /**
             * @var User $user
             */
            $user = User::find()->where(['nickname' => $this->nickname])->one();
            if ($user != null) {
                if ($this->password === $user->password) {
                    return Yii::$app->user->login($user,3600*24*30);
//                    return true;
                }
            }

            return false;
        }
    }
}