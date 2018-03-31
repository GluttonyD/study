<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 21.03.2018
 * Time: 18:15
 */

namespace app\models;


use phpDocumentor\Reflection\DocBlock\Tag;
use yii\base\Model;

class AddTag extends Model
{
    public $tags=array();

    public function rules()
    {
        return [
            [['tags'],'string'],
            [['tags'],'allFilled']
        ];
    }


    public function allFilled($attribute,$params){
        foreach ($this->tags as $item){
            if($item==null){
                $this->addError($attribute,'Все поля должны быть заполнены');
                return false;
            }
        }
        return true;
    }

    public function add(){
        foreach ($this->tags as $item){
            $model=Tags::find()->where(['tag'=>$item])->all();
            if($model==null){
                $tag=new Tags();
                $tag->tag=$item;
                $tag->save();
            }
        }
        return true;
    }
}