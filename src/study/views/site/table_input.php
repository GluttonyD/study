<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\AddToTable*/
$this->title='Ввод таблицы';
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<table>
    <form id="table-form" action="<?=Url::to(['site/table'])?>" method="post">

    <?php for($i=0;$i<$model->col_count;$i++){ ?>
    <tr>
        <?php for($j=0;$j<$model->row_count;$j++){
            ?>
        <td>
            <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
                <label for="add_to_table_data"><?= $i.':'.$j?></label>
            <input id="add_to_table_data" class="form-control" name="AddToTable[data][<?=$i?>][<?=$j?>]" type="text">
        </td>
        <?php } ?>
    </tr>
    <?php } ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    </form>

</table>
