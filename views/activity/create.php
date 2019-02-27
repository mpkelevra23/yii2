<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/20/19
 * Time: 8:05 PM
 * @var $activity \app\models\Activity
 */

use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

?>

<div class="row">
    <div class="col-md-6">
        <h2>Создание новой активности</h2>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <?= $form->field($activity, 'title'); ?>
        <?= $form->field($activity, 'date_start')->widget(DatePicker::class, [
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control']
        ]); ?>
        <?= $form->field($activity, 'date_end')->widget(DatePicker::class, [
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control']
        ]); ?>
        <?= $form->field($activity, 'notice')->dropDownList([
            'in_moment' => 'В момент события',
            'hour' => 'За один час',
            'day' => 'За один день',
            'week' => 'За одну неделю',
        ]); ?>
        <?= $form->field($activity, 'description')->textarea(['rows' => 10]); ?>
        <?= $form->field($activity, 'email'); ?>
        <?= $form->field($activity, 'repeat')->checkbox(); ?>
        <?= $form->field($activity, 'is_blocked')->checkbox(); ?>
        <?= $form->field($activity, 'files[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
