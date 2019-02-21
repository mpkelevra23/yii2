<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/21/19
 * Time: 12:00 AM
 */

namespace app\controllers\actions;

use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    public function run()
    {
        $comp = \Yii::createObject([
            'class' => ActivityComponent::class,
                'activity_class' => Activity::class
        ]);

        if (\Yii::$app->request->isPost) {
            /**
             * @var ActivityComponent $comp
             */
            $comp = \Yii::createObject([
                'class' => ActivityComponent::class,
//                'activity_class' => Activity::class
            ]);
            $activity = $comp->getModel(\Yii::$app->request->post());
            $comp->createActivity($activity);


        } else {
            $activity = $comp->getModel();
        }

        return $this->controller->render('create', ['activity' => $activity]);
    }
}