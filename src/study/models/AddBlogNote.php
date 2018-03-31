<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 27.03.2018
 * Time: 13:11
 */

namespace app\models;


use yii\base\Model;
use Yii;
use yii\helpers\VarDumper;

class AddBlogNote extends Model
{
    public $text;
    public $header;

    public function rules()
    {
        return [
            [['text','header'],'required'],
            [['text','header'],'string']
        ];
    }

    public function add(){
        if($this->validate()){
            $note=new Note();
            $note->text=$this->text;
            $note->header=$this->header;
//            VarDumper::dump(Yii::$app->user->getId());
            $note->author_id=Yii::$app->user->getId();
            $note->time=date("Y-m-d H:i:s");
            $note->rate=0;
            $note->save();
            return true;
        }
        return false;
    }
}