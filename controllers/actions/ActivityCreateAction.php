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
use yii\web\UploadedFile;

class ActivityCreateAction extends Action
{
    public function run()
    {
        /** @var ActivityComponent $comp */
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
                'activity_class' => Activity::class
            ]);
            if ($activity = $comp->getModel(\Yii::$app->request->post())) {
                $activity->files = UploadedFile::getInstances($activity, 'files');
                if ($activity->files) {
                    foreach ($activity->files as $file) {
                        $file->saveAs('data/' . $file->baseName . '.' . $file->extension);
                    }
                }
            }

            if ($comp->createActivity($activity)) {
                return $this->controller->render('show', ['activity' => $activity]);
            }


        } else {
            $activity = $comp->getModel();
        }

        return $this->controller->render('create', ['activity' => $activity]);
    }
}