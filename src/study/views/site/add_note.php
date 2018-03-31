<?php
/**
* @var $this yii\web\View
* @var $note app\models\AddNote
 * @var $tags app\models\AddTag
 * @var $success
 * */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title='Добавление заметки';
$config = array();
array_push($config, 'site/note');
?>
<form id="note-form" action="<?= Url::to($config) ?>" method="post">
    <label for="header">Заголовок</label>
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <input id="header" class="form-control" value="<?= $note->header ?>" type="text" name="AddNote[header]">
    <?php for($i=0;$i<5;$i++){ ?>
        <label for="tag">Тэг № <?= $i ?></label>
        <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
        <input id="tag" class="form-control" value="<?= $note->tags[$i] ?>" type="text" name="AddNote[tags][<?=$i?>]">
    <?php } ?>
    <label for="text">Заметка</label>
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <textarea id="text" name="AddNote[text]" class="form-control"></textarea>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>
</form>
<?php if(!$success){
    if($note->hasErrors()){
        foreach ($note->errors as $error)
            echo $error;
    }
}
        else{
            echo "Ввод успешен";
        }
    ?>