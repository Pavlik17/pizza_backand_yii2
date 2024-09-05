<?php

namespace app\controllers\admin;

use yii\base\Controller;
use app\models\Stocks;
use Yii;

class GetImagesStocksController extends Controller{
    public function actionGetImages():array{
        $images = Stocks::find()->asArray()->all();
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'stocks' => $images,
        ];
    }
}