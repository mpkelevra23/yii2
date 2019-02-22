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

    public function getModel($parsms = null)
    {
        /**
         * @var Activity $model
         */
        $model = new $this->activity_class;
        if ($parsms && is_array($parsms)) {
            $model->load($parsms);
        }

        return $model;
    }

    /**
     * @param $model
     * @return bool
     */

    public function createActivity(&$model):bool
    {
        return $model->validate();
    }
}