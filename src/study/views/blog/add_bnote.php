<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\AddBlogNote
 * @var $success
 * */


$this->title='Добавить запись';

use yii\helpers\Html;
use yii\helpers\Url;

$config = array();
array_push($config, 'add_note');

?>

<form id="bnote-form" method="post" action="<?= Url::to($config) ?>">
    <label for="bnote-header">Заголовок</label>
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <input id="bnote-header" class="form-control" type="text" name="AddBlogNote[header]">
    <label for="bnote-text">Сообщение</label>
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <textarea id="bnote-text" class="form-control" name="AddBlogNote[text]" ></textarea>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>
</form>
