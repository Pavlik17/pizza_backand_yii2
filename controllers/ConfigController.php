<?php

namespace app\controllers; 

use yii\rest\Controller;
use yii\filters\auth\HttpBearerAuth;

class ConfigController extends Controller{

    public function behaviors():array{
        $behavios = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }  
};
