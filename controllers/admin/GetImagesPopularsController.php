<?php 

namespace app\controllers\admin;

use app\models\Popular;
use yii\base\Controller;
use Yii;
use yii\web\NotFoundHttpException;

class GetImagesPopularsController extends Controller{
    public function actionGetImages(){
        $images = Popular::find()->asArray()->all();

        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        
        return [
            'popular' => $images,
        ];
    }
};