<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 3/1/19
 * Time: 9:01 PM
 */

namespace app\components;


use app\rules\ReadActivityOwnerRule;
use yii\base\Component;

class RbacComponent extends Component
{
    /**
     * @return \yii\rbac\ManagerInterface
     */
    public function getAuthManager()
    {
        return \Yii::$app->authManager;
    }

    /**
     * @throws \yii\base\Exception
     * @throws \Exception
     */
    public function generateRbacRules()
    {
        $authManager = $this->getAuthManager();

        $authManager->removeAll();

        $admin = $authManager->createRole('admin');
        $user = $authManager->createRole('user');

        $authManager->add($admin);
        $authManager->add($user);

        $createActivity = $authManager->createPermission('createActivity');
        $createActivity->description = 'Создание активности';

        $readActivityOwnerRule = new ReadActivityOwnerRule();

        $authManager->add($readActivityOwnerRule);

        $readActivity = $authManager->createPermission('readActivity');
        $readActivity->description = 'Просмотр активности';
        $readActivity->ruleName = $readActivityOwnerRule->name;

        $readAllActivity = $authManager->createPermission('readAllActivity');
        $readAllActivity->description = 'Просмотр всех активностей';

        $updateAllActivity = $authManager->createPermission('updateAllActivity');
        $updateAllActivity->description = 'Редактирование всех активностей';

        $authManager->add($createActivity);
        $authManager->add($readActivity);
        $authManager->add($readAllActivity);
        $authManager->add($updateAllActivity);

        $authManager->addChild($user, $createActivity);
        $authManager->addChild($user, $readActivity);

        $authManager->addChild($admin, $user);
        $authManager->addChild($admin, $readAllActivity);
        $authManager->addChild($admin, $updateAllActivity);

        $authManager->assign($user, 1);
        $authManager->assign($admin, 3);
    }

    public function canCreateActivity()
    {
        return \Yii::$app->user->can('createActivity');
    }

    public function canReadAllActivity()
    {
        return \Yii::$app->user->can('readAllActivity');
    }

    public function canReadActivity($activity): bool
    {
        return \Yii::$app->user->can('readActivity', ['activity' => $activity]);
    }


}