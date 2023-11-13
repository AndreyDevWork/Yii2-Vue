<?php

namespace app\modules\api\controllers;

use app\modules\api\models\LoginForm;
use app\modules\api\models\SignupForm;
use Yii;
use yii\filters\Cors;
use yii\rest\Controller;

class UserController extends Controller
{

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'cors' => Cors::class
        ]);
    }

    public function actionLogin() {

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser();
        }

        Yii::$app->response->statusCode = 422;
        $model->password = '';
        return [
            'errors' => $model->errors
        ];
    }


    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->register()) {
            return $model->_user;
        }

        Yii::$app->response->statusCode = 422;
        $model->password = '';
        return [
            'errors' => $model->errors
        ];
    }
}