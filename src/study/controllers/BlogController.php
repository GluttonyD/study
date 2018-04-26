<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 31.03.2018
 * Time: 14:48
 */

namespace app\controllers;

use app\models\ChangeRating;
use app\models\CommentForm;
use Yii;
use app\models\PostView;
use app\models\Note;
use app\models\AddBlogNote;
use app\models\Like;
use yii\helpers\VarDumper;
use yii\web\Controller;

class BlogController extends Controller
{

    public function actionIndex()
    {
        $model = Note::find()->all();
        return $this->render('blog', [
            'model' => $model
        ]);
    }

    public function actionAdd_note()
    {
        $model = new AddBlogNote();
        $success = false;
        if ($model->load(Yii::$app->request->post()) && $model->add()) {
            $success = true;
        }
        return $this->render('add_bnote', [
            'model' => $model,
            'success' => $success
        ]);
    }

    public function actionPost($id)
    {
        $post = new PostView();
        $post->newComment = new CommentForm();
        $success = false;
        if ($post->newComment->load(Yii::$app->request->post()) && $post->newComment->addComment($id)) {
            $success = true;
        }
        $post->getPost($id);
        return $this->render('show_post', [
            'post' => $post
        ]);
    }

    public function actionLike($object_id, $object_type, $mark)
    {
        $array = array();
        $array['rate'] = ChangeRating::changeRating($object_id, $object_type, $mark);
        if ($array['rate']) {
            return json_encode($array);
        }
        return false;
    }

    public function actionAddComment($id)
    {
        $post = new PostView();
        $post->newComment = new CommentForm();
        if ($post->newComment->load(Yii::$app->request->post()) && $post->newComment->addComment($id)) {
            return true;
        }
        return false;
    }

    public function actionUpdate($note_id)
    {
        return PostView::getAllComments($note_id);
    }
    public function actionGetNewComments($note_id,$comment_id){
        return json_encode(PostView::getNewComments($note_id,$comment_id));
    }
    public function actionUpdateRating($note_id){
        return json_encode(PostView::updateRating($note_id));
    }
    public function actionUpdatePosts(){

    }
}