<?php

namespace app\controllers;

use app\models\RegisterForm;
use app\models\User;
use yii\rest\Controller;
use Yii;

final class RegisterController extends Controller {  
    public function actionRegister(){
        $model = new RegisterForm();
        if($model->load(Yii::$app->request->post(),'') && $model->validate()){     
            $userData = User::findByEmail($model->email);

            if(empty($userData)) {
                $user = new User();
                $user->email = $model->email; 
                $user->password =  Yii::$app->getSecurity()->generatePasswordHash($model->password);
                $user->userName = $model->userName; 
                $user->phone = $model->phone;
                $user->authKey = null;
                $user->accessToken = null;
                $user->save();  

                Yii::$app->response->statusCode = 201;
                } else {   
                    Yii::$app->response->statusCode = 200;
                }
                return [];

            } else {
                throw new \yii\web\HttpException(400);
        }
    } 

    public function generateToken(){
        $token = "accesToken".Yii::$app->security->generateRandomString();
        return $token;
    }
    public function generateAuthKey(){
        $authKey = Yii::$app->security->generateRandomString();
        return $authKey;
    }
};


