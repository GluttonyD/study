<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\Note
 * */

$this->title="Блог";
?>
<div>
    <a class="btn btn-primary" href="blog/add_note">Добавить пост</a>
</div>
<?php
/**
 * @var $item \app\models\Note
 */

foreach ($model as $item){ ?>
<div>
    <p>Добавлено пользователем <?= $item->author_id ?>. Время добавления <?= $item->time  ?></p>
    <p align="center"><?= $item->header ?></p>
    <p align="center"> <?=  substr($item->text,0,20) ?>...<a href="blog/post?id=<?= $item->id ?>">Читать полностью</a></p>
</div>
<?php } ?>
