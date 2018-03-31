<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 31.03.2018
 * Time: 14:58
 */

namespace app\models;


use yii\base\Model;

class CommentForm extends Model
{
    public $text;

    public function rules()
    {
        return [
            [['text'],'string']
        ];
    }

    public function addComment($note_id){
        if($this->validate()){
            $model=new Comment();
            $model->text=$this->text;
            $model->time=date('Y-h-m H:m:s');
            $model->author_id=\Yii::$app->user->getId();
            $model->note_id=$note_id;
            $model->rate=0;
            $model->save();
            return true;
        }
        return false;
    }
}