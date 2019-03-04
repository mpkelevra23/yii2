<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 3/4/19
 * Time: 7:50 AM
 */

namespace app\controllers\actions;

use yii\base\Action;
use app\components\UsersAuthComponent;
use yii\web\HttpException;

class SignInAction extends Action
{
    public function run()
    {
        if (\Yii::$app->user->isGuest) {
            /** @var UsersAuthComponent $comp */
            $comp = \Yii::$app->auth;
            $model = $comp->getModel(\Yii::$app->request->post());
            if (\Yii::$app->request->isPost) {
                if ($comp->loginUser($model)) {
                    \Yii::$app->session->addFlash('success', 'Вы успешно авторизованы');
                    return $this->controller->redirect(['/site']);
                }
            }
            return $this->controller->render('signin', ['model' => $model]);
        }
        throw new HttpException(403, 'Вы уже вошли в систему');
    }
}