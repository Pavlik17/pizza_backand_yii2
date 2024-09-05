<?php
namespace app\controllers;

use app\models\AuthForm;
use app\models\User;
use Yii;
use yii\base\Controller;

final class AuthController extends Controller{
    
    public function actionAuth(){
        $model = new AuthForm();
        if($model->load(Yii::$app->request->post(),'') && $model->validate()){
            $user = User::findByEmail($model->email);
            if(!empty($user) &&  $user->validatePassword($model->password)){
                $token = $this->generateToken();
                $user->accessToken = $token;
                $user->save();
                Yii::$app->response->statusCode = 201;
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['accessToken' => $token];
            }
            throw new \yii\web\HttpException(401);
            return ['error' => 'Неверный логин или пароль'];
        }
        throw new \yii\web\HttpException(400);
        return ['error' => 'Ошибка валидации'];
    }

    public function generateToken(){
        $token = Yii::$app->security->generateRandomString();
        return $token;
    }
}