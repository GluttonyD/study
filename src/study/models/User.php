<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nickname
 * @property string $e_mail
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    public static function findIdentity($id){

    }
    public static function findIdentityByAccessToken($token, $type = null){

    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nickname', 'e_mail', 'password'], 'string', 'max' => 255],
            [['nickname', 'e_mail', 'password'], 'required'],
            [['e_mail'],'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'e_mail' => 'E Mail',
            'password' => 'Password',
        ];
    }
}
