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
            $user = User::findOne(['nickname' => $this->nickname]);
            if ($user != null) {
                if ($this->password === $user->password) {
                    return Yii::$app->user->login($user);
                }
            }

            return false;
        }
    }
}