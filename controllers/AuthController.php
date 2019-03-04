<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 3/1/19
 * Time: 12:39 PM
 */

namespace app\controllers;

use app\controllers\actions\SignInAction;
use app\controllers\actions\SignUpAction;
use yii\web\Controller;

class AuthController extends Controller
{

    public function actions()
    {
        return [
            'sign-in' => ['class' => SignInAction::class],
            'sign-up' => ['class' => SignUpAction::class]
        ];
    }
}