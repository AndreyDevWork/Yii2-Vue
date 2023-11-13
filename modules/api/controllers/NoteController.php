<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\NoteResource;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;

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
}