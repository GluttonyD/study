<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 21.03.2018
 * Time: 18:29
 */

namespace app\models;


use yii\base\Model;

class AddLink extends Model
{

    public function addLink($note_id,$tags){
        foreach ($tags as $tag){
            $link=new Link();
            /**
             * @var Tags $model
             */
            $model=Tags::find()->where(['tag'=>$tag])->one();
            $link->tag_id=$model->id;
            $link->note_id=$note_id;
            $link->save();
        }
        return true;
    }
}