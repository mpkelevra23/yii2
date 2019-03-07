<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/21/19
 * Time: 5:36 PM
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    /**
     * @var string class of activity entity
     */
    public $activity_class;

    /**
     * @throws \Exception
     */
    public function init()
    {
        parent::init();

        if (empty($this->activity_class)) {
            throw new \Exception('Need attribute activity_class');
        }
    }

    /**
     * @return Activity
     */

    public function getModel($params = null)
    {
        /**
         * @var Activity $model
         */
        $model = new $this->activity_class;
        if ($params && is_array($params)) {
            $model->load($params);
        }

        return $model;
    }

    /**
     * @param $id
     * @return Activity|array|\yii\db\ActiveRecord|null
     */
    public function getActivity($id)
    {
        return $this->getModel()::find()->andWhere(['id' => $id])->one();
    }

    /**
     * @return Activity|array|\yii\db\ActiveRecord|null
     */
    public function getAllUserActivity()
    {
        return $this->getModel()::find()->andWhere(['user_id' => \Yii::$app->user->id])->all();
    }

    /**
     * @param $model Activity
     * @return bool
     */
    public function createActivity(&$model): bool
    {
        $model->user_id = \Yii::$app->user->id;
        if ($model->validate()) {
            $model->files = UploadedFile::getInstances($model, 'files');
            if ($model->files) {
                foreach ($model->files as $file) {
                    $file->saveAs('data/' . $file->baseName . '.' . $file->extension);
                }
            }
        }
        return $model->save();
    }
}