<?php

namespace app\modules\api\controllers;

use app\models\LoginForm;
use Yii;
use yii\rest\Controller;

class UserController extends Controller
{

    public function actionLogin() {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser()->toArray(['id', 'username', 'access_token', ]);
        }

        Yii::$app->response->statusCode = 422;
        $model->password = '';
        return [
            'errors' => $model->errors
        ];
    }
}