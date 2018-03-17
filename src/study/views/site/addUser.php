<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 16.03.2018
 * Time: 23:37
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title="Регистрация";
$this->params['breadcrumbs'][] = $this->title;
?>
<p>Пожалуйста, введите следующие данные</p>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>
<?= $form->field($model,'nickname')->textInput()->label("Никнейм");?>
<?= $form->field($model,'e_mail')->textInput()->label('E-mail');?>
<?= $form->field($model,'password')->passwordInput()->label('Парль');?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
