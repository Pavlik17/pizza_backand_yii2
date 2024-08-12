<?php

namespace app\controllers\admin;

use app\models\ImagesFormStocksPopulars;
use Yii;
use yii\db\ActiveRecord;

class AddImageStocksPopularsController extends ActiveRecord{
    public function actionAddImage(){
        $model = new  ImagesFormStocksPopulars();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            Yii::$app->response->statusCode = 201;
        }else{
            Yii::$app->response->statusCode = 400;
        };
    }
};