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
use yii\web\Controller;

class BlogController extends Controller
{

    public function actionIndex(){
        $model=Note::find()->all();
        return $this->render('blog',[
            'model'=>$model
        ]);
    }

    public function actionAdd_note(){
        $model=new AddBlogNote();
        $success=false;
        if($model->load(Yii::$app->request->post())&&$model->add()){
            $success=true;
        }
        return $this->render('add_bnote',[
            'model'=>$model,
            'success'=>$success
        ]);
    }

    public function actionPost($id){
        $post=new PostView();
        $post->newComment=new CommentForm();
        $success=false;
        if($post->newComment->load(Yii::$app->request->post())&&$post->newComment->addComment($id)){
            $success=true;
        }
        $post->getPost($id);
        return $this->render('show_post',[
            'post'=>$post
        ]);
    }

    public function actionLike($object_id,$object_type,$mark){
        return ChangeRating::changeRating($object_id,$object_type,$mark);
    }
}