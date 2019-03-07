<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 3/1/19
 * Time: 12:49 PM
 */

namespace app\components;


use app\models\Users;
use yii\base\Component;

class UsersAuthComponent extends Component
{
    /**
     * @param null $params
     * @return Users
     */
    public function getModel($params = null)
    {
        $model = new Users();
        if ($params) {
            $model->load($params);
        }
        return $model;
    }

    /**
     * @param $model Users
     * @return bool
     */
    public function loginUser(&$model): bool
    {
        $user = $this->getUserByEmail($model->email);
        if (!$user) {
            $model->addError('email', 'Пользователя не существует');
            return false;
        }
        if (!$this->validatePassword($model->password, $user->password_hash)) {
            $model->addError('password', 'Пароль неверный');
            return false;
        }
        return \Yii::$app->user->login($user);
    }

    /**
     * @param $password
     * @param $hash
     * @return bool
     */
    private function validatePassword($password, $hash)
    {
        return \Yii::$app->security->validatePassword($password, $hash);
    }

    /**
     * @param $email
     * @return Users|array|\yii\db\ActiveRecord
     */
    public function getUserByEmail($email)
    {
        return $this->getModel()::find()->andWhere(['email' => $email])->one();
    }

    /**
     * @param $model Users
     * @return bool
     * @throws \Exception
     */
    public function createNewUser(&$model): bool
    {
        if (!$model->validate(['password', 'email'])) {
            return false;
        }
        $model->password_hash = $this->hashPassword($model->password);
        if ($model->save()) {
            $auth = \Yii::$app->authManager;
            $auth->assign($auth->getRole('user'), $model->id);
            return \Yii::$app->user->login(Users::findIdentity($model->id));
        }
        return false;
    }

    /**
     * @param $password
     * @return string
     * @throws \yii\base\Exception
     */
    private function hashPassword($password)
    {
        return \Yii::$app->security->generatePasswordHash($password);
    }
}