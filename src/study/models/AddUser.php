<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 17.03.2018
 * Time: 15:26
 */

namespace app\models;




use yii\base\Model;

class AddUser extends Model
{
    public $nickname;
    public $e_mail;
    public $password;

    public function rules()
    {
        return [
            [['nickname', 'e_mail', 'password'], 'string', 'max' => 255],
            [['nickname', 'e_mail', 'password'], 'required'],
            [['e_mail'],'email']
        ];
    }

    public function addUser(){
        $user=new User();
        if($this->validate()) {
            $user->nickname = $this->nickname;
            $user->e_mail = $this->e_mail;
            $user->password = $this->password;
            $user->save();
            return true;
        }
        return false;
    }
}