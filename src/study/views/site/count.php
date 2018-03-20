<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\AddToTable*/
$this->title='Ввод количества';
use yii\helpers\Html;
use yii\helpers\Url;

?>
<form id="count-form" action="<?=Url::to(['site/table'])?>" method="get">
    <input id="count" type="number" name="row">
    <input id="count_2" type="number" name="col">
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Перейти к вводу', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

</form>
