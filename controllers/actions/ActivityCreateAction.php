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
use yii\web\HttpException;
use yii\web\UploadedFile;

class ActivityCreateAction extends Action
{
    public function run()
    {
        if (!\Yii::$app->rbac->canCreateActivity()) {
            throw new HttpException(403, 'Нет доступа к созданию');
        }
        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        /** @var Activity $model */
        $activity = $comp->getModel(\Yii::$app->request->post());
        $activity->user_id = \Yii::$app->user->id;
        if (\Yii::$app->request->isPost) {
            if ($comp->createActivity($activity)) {
                $activity->files = UploadedFile::getInstances($activity, 'files');
                if ($activity->files) {
                    foreach ($activity->files as $file) {
                        $file->saveAs('data/' . $file->baseName . '.' . $file->extension);
                    }
                }
                return $this->controller->redirect(['/activity/view','id'=>$activity->id]);
            }
        } else {
            $activity = $comp->getModel();
        }
        return $this->controller->render('create', ['activity' => $activity]);
    }
}