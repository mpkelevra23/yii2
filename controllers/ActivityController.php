<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 2/20/19
 * Time: 4:57 PM
 */

namespace app\controllers;

use app\base\BaseController;
use app\controllers\actions\ActivityCreateAction;


class ActivityController extends BaseController
{
    public function actions()
    {
        return [
            'create' => ['class' => ActivityCreateAction::class]
        ];
    }
}