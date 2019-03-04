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

class ActivityComponent extends Component
{
    /**
     * @var string class of activity entity
     */
    public $activity_class;

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
     * @param $model Activity
     * @return bool
     */
    public function createActivity(&$model): bool
    {
        return $model->save();
    }
}