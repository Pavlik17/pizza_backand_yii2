<?php


namespace app\controllers;

use app\models\RegisterForm;
use app\models\User;
use yii\rest\Controller;
use Yii;

final class RegisterController extends Controller {  
    
    public function actionRegister(){
        $model = new RegisterForm();
        if($model->load(Yii::$app->request->getBodyParams(),'') && $model->validate()){     
            Yii::info('Запрос на регистрацию: ' . json_encode($model->attributes), __METHOD__);
            $userData = User::findByEmail($model->email);

            if(empty($userData)) {
                $user = new User();
                $user->email = $model->email; 
                $user->password =  Yii::$app->getSecurity()->generatePasswordHash($model->password);
                $user->userName = $model->userName; 
                $user->phone = $model->phone;
                $user->authKey = null;
                $user->accessToken = null;
                    if($user->save()){  
                        Yii::$app->response->statusCode = 201;
                        return ['status' => 'success', 'user' => $user];
                    }
                    else{
                        Yii::error($user->getErrors(), __METHOD__);
                        return ['errors' => $user->getErrors()];
                    }
                } else {   
                    Yii::$app->response->statusCode = 200;
                    return ['status' => 'exists', 'message' => 'User already exists'];
                }
                return [];
        } else {
            throw new \yii\web\BadRequestHttpException('Validation failed');
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


