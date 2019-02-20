<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/21/19
 * Time: 12:00 AM
 */

namespace app\controllers\actions;

use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    public function run()
    {
        $activity = new Activity();

        if (\Yii::$app->request->isPost) {
            $activity->load(\Yii::$app->request->post());

            if ($activity->validate()) {
                print_r($activity->getAttributes());
            } else {
                echo 'error validate';
            }

        } else {
            echo 'Ошибка отправки формы';
        }
        return $this->controller->render('create', ['activity' => $activity]);
    }
}