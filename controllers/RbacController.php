<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 3/1/19
 * Time: 9:04 PM
 */

namespace app\controllers;


use yii\web\Controller;

class RbacController extends Controller
{
    public function actionGen()
    {
        \Yii::$app->rbac->generateRbacRules();
    }

}