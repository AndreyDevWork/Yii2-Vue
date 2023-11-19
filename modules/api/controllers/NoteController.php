<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\NoteResource;
use app\modules\api\resources\UserResource;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\UnauthorizedHttpException;

class NoteController extends ActiveController
{


    public $modelClass = NoteResource::class;

    public function behaviors()
    {
        $behaviors =  parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];

        $behaviors['authenticator']['except'] = ['options'];
        $behaviors['cors'] = [
            'class' => Cors::class
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->byUser(\Yii::$app->user->id)
        ]);
    }
}