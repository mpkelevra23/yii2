<?php

/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 3/1/19
 * Time: 4:58 PM
 */

/* @var $this \yii\web\View */
/* @var $model \app\models\Users */
?>

<div class="row">
    <div class="col-md-6">
        <h2>Регистрация</h2>
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'method' => 'POST'
        ]) ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>
        <?= $form->field($model, 'passwordCheck')->passwordInput(); ?>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Регистрация</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>
