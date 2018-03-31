<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 31.03.2018
 * Time: 19:39
 */

namespace app\models;

use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\base\Model;

/**
 * Class ChangeRating
 * @package app\models
 */

/**
 * $object_type - тип объекта, 0 - комментарий, 1 - пост
 * $mark, 1 - лайк, 0 - дислайк
 */
class ChangeRating extends Model
{
    public static function changeRating($object_id,$object_type,$mark){
        /**
         * @var $marks Like
         */
        $marks=Like::find()
            ->where(['object_type'=>$object_type])
            ->andWhere(['object_id'=>$object_id])
            ->andWhere(['user_id'=>Yii::$app->user->getId()])
            ->one();
        if($marks){
            if($marks->mark==$mark)
                return false;
            else{
                $marks->mark=$mark;
                self::recalculateRating($object_type,$object_id,$mark,true);
                $marks->save();
                return true;
            }
        }
        $marks=new Like();
        $marks->mark=$mark;
        self::recalculateRating($object_type,$object_id,$mark,false);
        $marks->save();
        $marks->user_id=Yii::$app->user->getId();
        $marks->object_id=$object_id;
        $marks->object_type=$object_type;
        $marks->save();
        return true;
    }

    private static function recalculateRating($object_type,$object_id,$mark,$isChange){
        if($mark) {
            if ($object_type == 1) {
                /**
                 * @var $object Note
                 */
                $object = Note::find()->where(['id' => $object_id])->one();
                if($isChange)
                    $object->rate++;
                $object->rate++;
                $object->save();
            }
            if ($object_type == 0) {
                /**
                 * @var $object Comment
                 */
                $object = Comment::find()->where(['id' => $object_id])->one();
                if($isChange)
                    $object->rate++;
                $object->rate++;
                $object->save();
            }
        }
        else{
            if($object_type==1){
                /**
                 * @var $object Note
                 */
                $object=Note::find()->where(['id'=>$object_id])->one();
                if($isChange)
                    $object->rate--;
                $object->rate--;
                $object->save();
            }
            if($object_type==0){
                /**
                 * @var $object Comment
                 */
                $object=Comment::find()->where(['id'=>$object_id])->one();
                if($isChange)
                    $object->rate--;
                $object->rate--;
                $object->save();
            }
        }
    }
}