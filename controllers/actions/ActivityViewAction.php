<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 3/4/19
 * Time: 11:01 AM
 */

namespace app\controllers\actions;


use yii\base\Action;
use app\components\ActivityComponent;
use yii\web\HttpException;

class ActivityViewAction extends Action
{
    /**
     * @param $id
     * @return string
     * @throws HttpException
     */
    public function run()
    {

        /**
         * @var ActivityComponent $comp
         */

        $comp = \Yii::$app->activity;

        $activity = $comp->getAllUserActivity();





//        /**
//         * @var ActivityComponent $comp
//         */
//        $comp = \Yii::$app->activity;
//
//        $activity = $comp->getActivity($id);
//
//        if (!$activity) {
//            throw new HttpException(401, 'Activity not found');
//        }
//
//        if (!\Yii::$app->rbac->canReadAllActivity()) {
//            if (!\Yii::$app->rbac->canReadActivity($activity)) {
//                throw new HttpException(403, 'not access view this activity');
//            }
//        }

        return $this->controller->render('show', ['activity' => $activity]);
    }

}