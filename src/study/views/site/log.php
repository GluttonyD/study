<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title='Вход';
?>
<div>Введите данные для входа</div>
<?php $form=ActiveForm::begin();?>
<?= $form->field($model,'nickname')->textInput()->label('Никнейм');?>
<?= $form->field($model,'password')->passwordInput()->label('Пароль');?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
