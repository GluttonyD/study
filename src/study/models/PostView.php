<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 29.03.2018
 * Time: 15:27
 */

namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;

class PostView extends Model
{
    /**
     * @var $note Note
     * @var $comments Comment
     * @var $newComment CommentForm
     */
    public $note;
    public $comments;
    public $newComment;

    public function getPost($id){
        $this->note=Note::find()->where(['id'=>$id])->one();
        $this->comments=Comment::find()->where(['note_id'=>$id])->all();
    }
}