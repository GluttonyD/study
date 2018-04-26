<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 29.03.2018
 * Time: 15:27
 */

namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;
use yii\web\Cookie;

class PostView extends Model
{
    /**
     * @var $note Note
     * @var $comments Comment
     * @var $newComment CommentForm
     * @var Comment $item
     */
    public $note;
    public $comments;
    public $newComment;

    public function getPost($id){
        $this->note=Note::find()->where(['id'=>$id])->one();
        $this->comments=Comment::find()->where(['note_id'=>$id])->all();
    }

    public static function getAllComments($note_id){
        $array=array(array());
        $i=0;
        $comments_all=Comment::find()->where(['note_id'=>$note_id])->all();
        /**
         * @var Comment $item
         */
        foreach ($comments_all as $item){
            $array[$i]['id']=$item->id;
            $array[$i]['author']=$item->author_id;
            $array[$i]['text']=$item->text;
            $array[$i]['rate']=$item->rate;
            $array[$i]['time']=$item->time;
            $i++;
        }
        //поискать нормальное получение последнего элемента массива
        $array=array_reverse($array);
        self::setCookie($array[0]['id']);
        $array=array_reverse($array);
        if($array[0]){
            return json_encode($array);
        }
        else{
            return null;
        }
    }
    public static function getCookie(){
        $cookie = \Yii::$app->request->cookies;
        return $cookie->getValue('comment_id',0);
    }
    public static function setCookie($value){
        $setCookie=\Yii::$app->response->cookies;
        $setCookie->add(new Cookie(['name'=>'comment_id','value'=>$value]));
    }
    public static function getNewComments($note_id, $comment_id)
    {
        $current_comment_id = self::getCookie();
        $comments = Comment::find()->where(['note_id' => $note_id])->andWhere(['>', 'id', $current_comment_id])->orderBy(['id'=>SORT_DESC])->asArray()->all();
        if($comments[0]) {
            self::setCookie((int)$comments[0]['id']);
            return array_reverse($comments);
        }
        else{
            return false;
        }
    }
    public static function updateRating($note_id){
        $array=array(array());
        $i=0;
        $comments_all=Comment::find()->where(['note_id'=>$note_id])->all();
        /**
         * @var Comment $item
         */
        foreach ($comments_all as $item){
            $array[$i]['id']=$item->id;
            $array[$i]['rate']=$item->rate;
            $i++;
        }
        if($array[0])
            return $array;
        else
            return false;
    }
}