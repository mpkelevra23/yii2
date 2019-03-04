<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/28/19
 * Time: 7:00 PM
 */
?>
<div class="row">
    <div class="col-md-6">
        <pre><?= print_r($users) ?></pre>
    </div>
    <div class="col-md-6">
        <pre><?= print_r($activityUser) ?></pre>
    </div>
    <div class="col-md-6">
        <pre><?= print_r($firstActivity) ?></pre>
    </div>
    <div class="col-md-6">
        <pre><?= 'Кол-во событий с уведомление ' . $countNoticeActivity ?></pre>
    </div>
    <div class="col-md-6">
        <pre><?= print_r($getAllActivityUser) ?></pre>
    </div>
    <div class="col-md-6">
        <pre>
        <?php foreach ($getActivityReader as $item): ?>
            <?= print_r($item) ?>
        <?php endforeach; ?>
        </pre>
    </div>
</div>