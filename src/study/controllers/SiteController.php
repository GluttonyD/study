<?php

namespace app\controllers;

use app\models\AddBlogNote;
use app\models\PostView;
use app\models\AddLink;
use app\models\AddNote;
use app\models\AddTag;
use app\models\AddToTable;
use app\models\AddToTable2;
use app\models\AddUser;
use app\models\Login;
use app\models\Note;
use app\models\Notes;
use app\models\Table;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */


    public function actionAdd()
    {
        $user = new AddUser();
        if ($user->load(Yii::$app->request->post()) && $user->addUser()) {
            return $this->goHome();
        } else {
            return $this->render('addUser', [
                'model' => $user
            ]);
        }
    }

    public function actionLog()
    {
        $model = new Login();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            echo Yii::$app->user->getId();
//            echo 'suck';
//            VarDumper::dump(Yii::$app->user);
            return $this->goHome();
        } else {
            return $this->render('log', [
                'model' => $model
            ]);
        }
    }


    public function actionTable($row = null, $col = null, $modify_id = null)
    {
        $model = new AddToTable($modify_id, $row, $col);
        $success = false;
        if ($model->load(Yii::$app->request->post()) && $model->validate()&& $model->add($modify_id)) {
            $success = true;
        }
        return $this->render('table_modify', [
            'model' => $model,
            'id' => $modify_id,
            'row' => $row,
            'col' => $col,
            'success' => $success
        ]);

    }


    public function actionCount()
    {
        return $this->render('count');
    }

    public function actionNote(){
        $note=new AddNote();
//        $link=new AddLink();
        $success=false;
        if($note->load(Yii::$app->request->post())&& $note->insert()){
            //VarDumper::dump($note);
//            $link->addLink($note->id,$note->tags);
            $success=true;
        }
        return $this->render('add_note',[
            'note'=>$note,
            'success'=>$success
        ]);
    }

    public function actionShownotes(){
//        $notes=Notes::find()->where(['id'=>5])->with(['tags'])->all();
//        $notes=Notes::find()->where(['id'=>5])->with(['tags'])->all();
        $notes=Notes::find()->with(['bigTags'])->all();

        /**
         * @var Notes[] $notes
         */
        $tag_id=10;
        foreach ($notes as $note){
            VarDumper::dump($note->bigTags);
        }
        /**
         * @var Notes $item
         */

//        }
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
