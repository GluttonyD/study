<?php
/**
 * @var $this yii\web\View
 * @var $post app\models\PostView
 * @var $item app\models\Comment
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title=$post->note->header;
$config = array();
array_push($config, 'blog/post');
$config['id']=$post->note->id;
$comment=$post->newComment;
$configLike=array();
?>
<div>
    <p align="center"> <?= $post->note->header ?></p>
    <p><?= $post->note->text ?></p>
    <span>
        <a class="glyphicon glyphicon-plus" href="like?object_id=<?=$post->note->id?>&object_type=1&mark=1"></a>
        <?= $post->note->rate ?>
        <a class="glyphicon glyphicon-minus" href="like?object_id=<?=$post->note->id?>&object_type=1&mark=0"></a>
    </span>
    <p><b>Комментарии</b></p>
    <?php foreach ($post->comments as $item) {?>
        <p>
            <span> От пользователя <b><?= $item->author_id ?></b></span>
            <span><?= $item->text ?></span>
        </p>
        <span>
            <a class="glyphicon glyphicon-plus" href="like?object_id=<?=$item->id?>&object_type=0&mark=1"></a>
            <?= $item->rate ?>
            <a class="glyphicon glyphicon-minus" href="like?object_id=<?=$item->id?>&object_type=0&mark=0"></a>
        </span>
    <?php } ?>
</div>
<?php if(!Yii::$app->user->isGuest){ ?>
<form id="add-comment" method="post" action="<?= Url::to($config) ?>">
    <label for="comment-input">Добавить комментарий</label>
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <input id="comment-input" type="text"  class="form-control"  name="CommentForm[text]">
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>
</form>
<?php } ?>
