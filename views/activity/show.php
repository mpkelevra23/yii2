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
    <?php foreach ($activity as $item): ?>
        <ul>
            <li><label>Заголовок</label>: <?= Html::encode($item->title) ?></li>
            <li><label>Описание</label>: <?= Html::encode($item->description) ?></li>
            <li><label>Время начала</label>: <?= Html::encode(date("d.m.Y", strtotime($item->date_start))) ?></li>
        </ul>
    <?php endforeach; ?>
    <?= Html::a('Новая активность', ['/activity/create'], ['class' => 'btn btn-default']) ?>
</div>
