<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/25/19
 * Time: 1:16 PM
 */

use yii\helpers\Html;

?>

<div class="row">
    <ul>
        <li><label>Заголовок</label>: <?= Html::encode($activity->title) ?></li>
        <li><label>Описание</label>: <?= Html::encode($activity->description) ?></li>
        <li><label>Email</label>: <?= Html::encode($activity->email) ?></li>
        <li><label>Время начала</label>: <?= Html::encode($activity->date_start) ?></li>
    </ul>

    <?= Html::a('Новая активность', ['/activity/create'], ['class' => 'btn btn-default'])?>
</div>
