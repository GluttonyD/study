<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\AddToTable
 * @var $id
 * @var $col
 * @var $row
 */
$this->title='Редактирование таблицы';
use yii\helpers\Html;
use yii\helpers\Url;
?>
<table>
    <form id="table-mod-form" action="<?=Url::to(['site/table','modify_id'=>$id])?>" method="post">
        <?php if($id){?>
        <?php   foreach ($model->data as $row_id => $row){ ?>
        <tr>
            <?php  foreach ($row as $column_id => $cell){ ?>
            <td>
                <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
                <input id="add_to_table_data" class="form-control" name="AddToTable[data][<?=$row_id?>][<?=$column_id?>]" type="text" value="<?=$cell?>">
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
        <?php }
        else{ ?>
        <?php   for($row_id=0;$row_id<$row;$row_id++){ ?>
        <tr>
            <?php for($column_id=0;$column_id<$col;$column_id++){ ?>
                <td>
                    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
                    <input id="add_to_table_data" class="form-control" name="AddToTable[data][<?=$row_id?>][<?=$column_id?>]" type="text" value="">
                </td>
            <?php } ?>
        </tr>
        <?php }?>
        <?php } ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    </form>
</table>
