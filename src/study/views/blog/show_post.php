<?php
/**
 * @var $this yii\web\View
 * @var $post app\models\PostView
 * @var $item app\models\Comment
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = $post->note->header;
$config = array();
array_push($config, 'blog/post');
$config['id'] = $post->note->id;
$comment = $post->newComment;
$configLike = array();
?>
<div id="post" data-post_id="<?= $post->note->id ?>">
    <p align="center"> <?= $post->note->header ?></p>
    <p><?= $post->note->text ?></p>
    <div class="">
        <a id="like_post" data-id="<?= $post->note->id ?>" data-mark="1" data-type="1"
           class="post_mark glyphicon glyphicon-plus"
           href="like?object_id=<?= $post->note->id ?>&object_type=1&mark=1" style="float: left"></a>
        <div id="rate" style="float: left"><?= $post->note->rate ?></div>
        <a id="dislike_post" data-id="<?= $post->note->id ?>" data-mark="0" data-type="1"
           class="post_mark glyphicon glyphicon-minus"
           href="like?object_id=<?= $post->note->id ?>&object_type=1&mark=0"></a>
    </div>
    <p><b>Комментарии</b></p>
    <div id="comment-block">
    </div>
</div>
<?php if (!Yii::$app->user->isGuest) { ?>
    <form class="comment" id="add-comment" data-post_id="<?= $post->note->id ?>" method="post"
          action="<?= Url::to($config) ?>">
        <label for="comment-input">Добавить комментарий</label>
        <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
        <input id="comment-input" type="text" class="form-control" name="CommentForm[text]">
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Добавить', ['id' => 'add-comment', 'class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    </form>
<?php } ?>
