<?php

namespace app\modules\api\controllers;

use app\modules\api\models\LoginForm;
use Yii;
use yii\rest\Controller;

class UserController extends Controller
{

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
}