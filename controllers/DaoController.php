<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/27/19
 * Time: 7:01 PM
 */

namespace app\controllers;


use app\base\BaseController;
use app\components\DaoComponent;

class DaoController extends BaseController
{
    /**
     * @return string
     */
    public function actionTest()
    {

        /**
         * @var DaoComponent $dao
         */
        $dao = \Yii::$app->dao;
        $dao->insertTest();
        $users = $dao->getAllUsers();
        $activityUser = $dao->getActivityUser(2);
        $firstActivity = $dao->getFirstActivity();
        $countNoticeActivity = $dao->countNoticeActivity();
        $getAllActivityUser = $dao->getAllActivityUser(3);
        $getActivityReader = $dao->getActivityReader();


        return $this->render('test',
            [
                'users' => $users,
                'activityUser' => $activityUser,
                'firstActivity' => $firstActivity,
                'countNoticeActivity' => $countNoticeActivity,
                'getAllActivityUser' => $getAllActivityUser,
                'getActivityReader' => $getActivityReader
            ]
        );
    }
}