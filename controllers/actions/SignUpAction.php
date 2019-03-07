<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 3/4/19
 * Time: 9:12 AM
 */

namespace app\controllers\actions;

use yii\base\Action;
use app\components\UsersAuthComponent;
use yii\web\HttpException;

class SignUpAction extends Action
{
    /**
     * @return string|\yii\web\Response
     * @throws HttpException
     */
    public function run()
    {
        /** @var UsersAuthComponent $comp */
        if (\Yii::$app->user->isGuest) {
            $comp = \Yii::$app->auth;
            $model = $comp->getModel(\Yii::$app->request->post());
            if (\Yii::$app->request->isPost) {
                try {
                    if ($comp->createNewUser($model)) {
                        \Yii::$app->session->addFlash('success', 'Вы успешно зарегестрировались ');
                        return $this->controller->redirect(['/site']);
                    }
                } catch (\Exception $e) {
                }
            }
            return $this->controller->render('signup', ['model' => $model]);
        }
        throw new HttpException(403, 'Вы уже зарегестрированы');
    }
}
